<?php
namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $todayApplications = Guest::whereDate('created_at', today())->count();
        $yesterdayApplications = Guest::whereDate('created_at', today()->subDay())->count();
        $totalApplications = Guest::count();

        $todayDocuments = Guest::whereDate('created_at', today())->whereHas('documents')->count();
        $yesterdayDocuments = Guest::whereDate('created_at', today()->subDay())->whereHas('documents')->count();
        $totalDocuments = Guest::whereHas('documents')->count();

        // Группировка по типу документа
        $documents = [
            'DL' => Guest::whereHas('documents', function($query) {
                $query->whereNotNull('driving_license');
            })->count(),
            'ID' => Guest::whereHas('documents', function($query) {
                $query->whereNotNull('id_card');
            })->count(),
            'Selfie' => Guest::whereHas('documents', function($query) {
                $query->whereNotNull('selfie');
            })->count(),
            'CC' => Guest::whereHas('documents', function($query) {
                $query->whereNotNull('credit_card');
            })->count()
        ];

        // Группировка по штатам
        $stateApplications = Guest::select('state', \DB::raw('count(*) as count'))
            ->groupBy('state')
            ->get()
            ->pluck('count', 'state')
            ->toArray();

        // Полный список штатов США
        $states = [
            'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California',
            'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'FL' => 'Florida', 'GA' => 'Georgia',
            'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa',
            'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland',
            'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri',
            'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey',
            'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio',
            'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina',
            'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont',
            'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming'
        ];

        // Приведение ключей к верхнему регистру
        $stateApplications = array_change_key_case($stateApplications, CASE_UPPER);

        return view('admin.dashboard.statistics', compact(
            'todayApplications', 'yesterdayApplications', 'totalApplications',
            'todayDocuments', 'yesterdayDocuments', 'totalDocuments',
            'stateApplications', 'states', 'documents'
        ));
    }
}
