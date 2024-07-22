<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Guest $guest)
    {
        // Проверяем, существует ли гость
        $guest = Guest::with(['bank', 'documents', 'job_info'])->findOrFail($guest->id);

        // Удаляем связанные записи
        if ($guest->bank) {
            $guest->bank->delete();
        }

        if ($guest->documents) {
            // Удаляем файлы документов из хранилища
            foreach (['driving_front', 'driving_back', 'id_front', 'id_back', 'passport', 'selfie', 'additional_document'] as $docField) {
                if ($guest->documents->$docField) {
                    \Storage::delete('public/' . $guest->documents->$docField);
                }
            }
            $guest->documents->delete();
        }

        if ($guest->job_info) {
            $guest->job_info->delete();
        }

        // Удаляем гостя
        $guest->delete();

        // Возвращаем ответ с успешным статусом
        return redirect()->route('admin.dashboard.index')->with('success', 'Guest deleted successfully.');
    }
}
