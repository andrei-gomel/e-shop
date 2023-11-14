<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\ImageService;

class BaseController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new ImageService();
    }
}
