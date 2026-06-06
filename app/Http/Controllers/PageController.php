<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function webApplication()
    {
        return view('services.web-application');
    }

    public function webDevelopment()
    {
        return view('services.web-development');
    }

    public function software()
    {
        return view('services.software');
    }

    public function digitalMarketing()
    {
        return view('services.digital-marketing');
    }

    public function graphicsDesign()
    {
        return view('services.graphics-design');
    }

    public function uiUxDesign()
    {
        return view('services.ui-ux-design');
    }
}
