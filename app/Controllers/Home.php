<?php

namespace App\Controllers;

use App\Models\DataBalitaModel;
use App\Models\JadwalimunisasiModel;

class Home extends BaseController
{
    protected $DataBalitaModel;
    protected $JadwalimunisasiModel;
    public function __construct()
    {
        $this->DataBalitaModel = new DataBalitaModel();
        $this->JadwalimunisasiModel = new JadwalimunisasiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Jadwal Imunisasi',
            'jadwal' => $this->JadwalimunisasiModel->findAll(),
        ];
      
        //  $data['jumlah_balita'] = $this->DataBalitaModel->getJumlahBalitaPerPosyandu();
        return view('page/index',$data);
    }
}
