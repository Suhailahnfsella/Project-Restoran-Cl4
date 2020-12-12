<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetail_M extends Model
{
    protected $table = 'vorderdetail';
    protected $allowedFields = ['idorder', 'idmenu', 'jumlah', 'hargajual'];
    protected $primaryKey = 'idorder';
}
