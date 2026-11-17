<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DasboardController extends Controller
{
    // Panggil Dashboard
    public function index(): View
    {
        return view('admin.dashboard');
    }
}