<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;
use App\Models\Kategori_M;

class Daftar extends BaseController
{
    public function index()
    {
        $modelk = new Kategori_M();
        $data = [
            'kategori' => $modelk->findAll()
        ];

        return view('template/daftar', $data);
    }

    public function insert()
    {
        if (isset($_POST['simpan'])) {
            if ($_POST['password'] === $_POST['konfirmpassword']) {
                $data = [
                    'pelanggan' => $_POST['pelanggan'],
                    'alamat' => $_POST['alamat'],
                    'telp' => $_POST['telp'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'aktif' => 1
                ];

                $model = new Pelanggan_M();

                if ($model->insert($data) === false) {
                    $error = $model->errors();
                    session()->setFlashdata('info', $error);
                    return redirect()->to(base_url("/front/daftar"));
                } else {
                    return redirect()->to(base_url("/front/homepage"));
                }
            } else {
                $modelk = new Kategori_M();
                $data = [
                    'kategori' => $modelk->findAll()
                ];
                return view('tes/error', $data);
            }
        }
    }
}
