<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;

class Kategori extends BaseController
{
    public function menu($id = null)
    {
        $pager = \Config\Services::pager();
        if (isset($id)) {
            $modelm = new Menu_M();
            $modelk = new Kategori_M();

            $jumlah = $modelm->where('idkategori', $id)->findAll();
            $total = count($jumlah);

            $tampil = 3;
            $mulai = 0;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                $mulai = ($tampil * $page) - $tampil;
            }

            $menu = $modelm->where('idkategori', $id)->findAll($tampil, $mulai);

            $data = [
                'id' => $id,
                'kategori' => $modelk->findAll(),
                'menu' => $menu,
                'pager' => $pager,
                'tampil' => $tampil,
                'total' => $total
            ];

            return view("front/menu", $data);
        }
    }

    //--------------------------------------------------------------------

}
