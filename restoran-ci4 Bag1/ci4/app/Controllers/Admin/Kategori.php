<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		echo "<h1>Belajar CI-4</h1>";
	}

	public function select()
	{
		$model = new Kategori_M();
		$kategori = $model->findALL();

		$data = [
			'judul' => 'SELECT DATA DARI CONTROLLER',
			'kategori' => $kategori
		];

		return view("kategori/select", $data);
	}

	public function selectWhere($id = null)
	{
		echo "<h1>menampilkan data yang dipilih $id </h1>";
	}

	public function formInsert()
	{
		return view("kategori/forminsert");
	}

	public function formUpdate($id = null)
	{
		echo view("kategori/update");
	}

	public function update($id = null)
	{
		echo "<h1>proses update data $id </h1>";
	}

	public function delete($id = null)
	{
		echo "<h1>proses delete data</h1>";
	}

	//--------------------------------------------------------------------

}
