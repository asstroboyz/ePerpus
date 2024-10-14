<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $session = session();
        $data = [
            'title' => 'Dashboard',
        ];
        return view('baru/dashboard/index', $data);
    }
}
