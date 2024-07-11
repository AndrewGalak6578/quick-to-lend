<?php

namespace App\Http\Controllers\Loan;

use App\Http\Controllers\Controller;
use App\Service\LoanService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(LoanService $service)
    {
        $this->service = $service;
    }
}
