<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Pelanggan_M;
use App\Models\Kategori_M;

class Login extends BaseController
{
	public function index()
	{
		$modelk = new Kategori_M();
		$data = [];
		$data = [
			'kategori' => $modelk->findAll()
		];
		if ($this->request->getMethod() == 'post') {
			$email = $this->request->getPost('emailp');
			$password = $this->request->getPost('password');

			$model = new Pelanggan_M();
			$pelanggan = $model->where(['email' => $email])->first();

			if (empty($pelanggan)) {
				$data = [
					'info' => "Email Salah",
					'kategori' => $modelk->findAll()
				];
			} else {
				if (password_verify($password, $pelanggan['password'])) {
					$this->setSession($pelanggan);
					return redirect()->to(base_url("Front/Homepage"));
				} else {
					$data = [
						'info' => "Password Salah",
						'kategori' => $modelk->findAll()
					];
				}
			}
		} else {
			# code...
		}

		return view('template/loginfront', $data);
	}

	public function setSession($pelanggan)
	{
		$data = [
			'pelanggan' => $pelanggan['pelanggan'],
			'emailp' => $pelanggan['email'],
			'password' => $pelanggan['password'],
			'idpelanggan' => $pelanggan['idpelanggan'],
			'logIn' => true
		];

		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('front/homepage'));
	}

	//--------------------------------------------------------------------

}
