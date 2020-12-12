<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;

class Homepage extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$modelm = new Menu_M();
		$modelk = new Kategori_M();

		$data = [
			'judul' => 'DATA MENU',
			'menu' => $modelm->paginate(3, 'page'),
			'pager' => $modelm->pager,
			'kategori' => $modelk->findAll()
		];

		return view('front/menu', $data);
	}

	//--------------------------------------------------------------------

}
