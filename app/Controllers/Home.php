<?php

namespace App\Controllers;

use App\Models\DataBalitaModel;

class Home extends BaseController
{
    protected $DataBalitaModel;
    public function __construct()
    {
        $this->DataBalitaModel = new DataBalitaModel();
    }
    public function index()
    {
        // if (logged_in(true)) {
        //     return view('user/home');
        // }
        // return view('landing/home/index');
        //  $data['jumlah_balita'] = $this->DataBalitaModel->getJumlahBalitaPerPosyandu();
        return view('page/index',);
    }
}
