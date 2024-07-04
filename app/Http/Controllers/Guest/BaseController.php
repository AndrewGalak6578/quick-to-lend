<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Service\GuestService;

class BaseController extends Controller
{
public $service;

public function __construct(GuestService $service)
{
    $this->service = $service;
}
}
