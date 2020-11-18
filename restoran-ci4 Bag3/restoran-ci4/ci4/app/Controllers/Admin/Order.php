<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Order extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM tblorder ORDER BY status ASC";
        $result = $db->query($sql);
        $row = $result->getResult('array');

        echo $row[0]['idorder'];
        echo "<br>";

        foreach ($row as $key) {
            echo $key['tglorder'];
            echo "<br>";
        }

        // echo $row[0]->idorder;
        // echo "<br>";
        // echo $row[0]->total;

        // foreach ($row as $key) {
        //     echo $key->tglorder;
        //     echo "<br>";
        // }

        echo "<hr>";

        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }

    //--------------------------------------------------------------------

}
