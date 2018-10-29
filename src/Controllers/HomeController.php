<?php

namespace VioletaskyaFrontend\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $variables = [
            'APP_URL' => config('app.url')
        ];

        return view('violetaskya-frontend::welcome', compact('variables'));
    }
}