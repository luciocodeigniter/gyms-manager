<?php

namespace App\Controllers;

use CodeIgniter\View\RendererInterface;

class HomeController extends BaseController
{
    /**
     * Display view home
     *
     * @return RendererInterface
     */
    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];

        return view('Home/index', $data);
    }
}
