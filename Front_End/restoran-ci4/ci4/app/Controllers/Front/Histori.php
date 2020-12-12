<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\OrderDetail_M;

class Histori extends BaseController
{
	public function histori()
	{
		$modelk = new Kategori_M();
		$db = \Config\Database::connect();

		$vorder = $db->table('vorder');
		$email = session()->get('emailp');
		$result = $vorder->getWhere(['email' => $email]);

		$halaman = $result->getResult('array');
		$count = count($halaman);

		$result = $vorder->getWhere(['email' => $email]);
		$vo = $result->getResult('array');

		$data = [
			'kategori' => $modelk->findAll(),
			'vorder' => $vo,
			'total' => $count
		];
		return view('front/histori', $data);
	}

	public function detail($id)
	{
		$modelk = new Kategori_M();
		$modelod = new OrderDetail_M();
		$db = \Config\Database::connect();

		$jumlah = $modelod->where('idorder', $id)->findAll();
		$count = count($jumlah);

		$detail = $modelod->where('idorder', $id)->findAll();

		$data = [
			'kategori' => $modelk->findAll(),
			'detail' => $detail
		];

		return view('front/detail', $data);
	}
	//--------------------------------------------------------------------

}
