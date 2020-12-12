<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\OrderDetail_M;


class Beli extends BaseController
{
    public function beli($id = null)
    {
        $modelk = new Kategori_M();
        $modelm = new Menu_M();
        $total = 0;
        $idk = $modelm->where('idmenu', $id)->findColumn('idkategori');
        if (isset($id)) {
            $this->isi($id);
            return redirect()->to(base_url('/front/kategori/menu/' . $idk[0]));
        } else {
            foreach (session()->get() as $key => $value) {
                if (
                    $key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan'
                    && $key <> 'emailp' && $key <> 'idpelanggan' && $key <> 'loggedIn' && $key <> 'password' && $key <> 'logIn'
                ) {
                    $id = substr($key, 1);
                    $menu[] = $modelm->where('idmenu', $id)->findAll();
                    $jumlah[] = $value;
                }
            }
            if (!isset($menu)) {
                $menu = [];
                $jumlah = [];
            }
            $data = [
                'kategori' => $modelk->findAll(),
                'menu' => $menu,
                'jumlah' => $jumlah,
                'total' => $total
            ];
        }
        return view('front/beli', $data);
    }

    public function isi($id)
    {
        if (session()->has('_' . $id)) {
            session()->set('_' . $id, session()->get('_' . $id) + 1);
        } else {
            session()->set('_' . $id, 1);
        }
        var_dump($_SESSION);
    }

    public function kurang($id = null)
    {
        $idmenu = '_' . $id;
        session()->set($idmenu, session()->get($idmenu) - 1);
        if (session()->get($idmenu) == 0) {
            session()->remove($idmenu);
        }

        return redirect()->to(base_url('Front/Beli/beli'));
    }

    public function tambah($id = null)
    {
        session()->set('_' . $id, session()->get('_' . $id) + 1);
        return redirect()->to(base_url('Front/Beli/beli'));
    }

    public function hapus($id = null)
    {
        $idmenu = '_' . $id;
        session()->remove($idmenu);
        return redirect()->to(base_url('Front/Beli/beli'));
    }

    public function checkout($total = null, $id = null)
    {
        $db = \Config\Database::connect();
        $modelm = new Menu_M();
        $modelk = new Kategori_M();
        $menu[] = $modelm->where('idmenu', $id)->findAll();
        $data = [
            'kategori' => $modelk->findAll()
        ];
        if (isset($total)) {
            $idorder = $this->idorder();
            $idpelanggan = session()->get('idpelanggan');
            date_default_timezone_set('Asia/Jakarta');
            $tgl = Date('Y-m-d');
            $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";
            $hasil = $db->query($sql);
            $detail = $hasil->getResult('array');
            $count = count($detail);

            if ($count == 0) {
                $this->insertOrder($idorder, $idpelanggan, $tgl, $total);
                $this->insertDetail($idorder);
            } else {
                $this->insertDetail($idorder);
            }

            $this->kosongkanSession();
            return view('front/pesan', $data);
        } else {
            $id = $this->idorder() - 1;
            $modelk = new Kategori_M();
            $modelod = new OrderDetail_M();
            $data = [
                'teks' => 'Terimakasih sudah Berbelanja',
                'kategori' => $modelk->findAll(),
                'menu' => $menu,
                'total' => $total,
                'order' => $modelod->where('idorder', $id)->findAll(),
                'id' => $id
            ];
            return view('front/beli', $data);
        }
    }

    public function kosongkanSession()
    {
        foreach (session()->get() as $key => $value) {

            if (
                $key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan'
                && $key <> 'emailp' && $key <> 'idpelanggan' && $key <> 'loggedIn' && $key <> 'password' && $key <> 'logIn'
            ) {
                session()->remove($key);
            }
        }
    }

    public function idorder()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $result = $db->query($sql);
        $detail = $result->getResult('array');
        $jumlah = count($detail);
        if ($jumlah == 0) {
            $id = 1;
        } else {
            $id = $jumlah + 1;
        }
        return $id;
    }

    public function insertOrder($idorder, $idpelanggan, $tgl, $total)
    {
        $db = \Config\Database::connect();
        $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total, 0, 0, 0)";
        $db->query($sql);
    }

    public function insertDetail($idorder)
    {
        $modelm = new Menu_M();
        $modelod = new OrderDetail_M();
        foreach (session()->get() as $key => $value) {
            if (
                $key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan'
                && $key <> 'emailp' && $key <> 'idpelanggan' && $key <> 'loggedIn' && $key <> 'password' && $key <> 'logIn'
            ) {
                $id = substr($key, 1);
                $row = $modelm->where('idmenu', $id)->findAll();
                foreach ($row as $r) {
                    $idmenu = $r['idmenu'];
                    $harga = $r['harga'];
                    $data = [
                        'idorder' => $idorder,
                        'idmenu' => $idmenu,
                        'jumlah' => $value,
                        'hargajual' => $harga
                    ];
                    $modelod->insert($data);
                }
            }
        }
    }

    //--------------------------------------------------------------------

}
