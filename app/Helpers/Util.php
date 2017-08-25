<?php

namespace App\Helpers;

use Carbon\Carbon;

class Util {

    public static function dataToMysql($data)
    {
        $dtCarbon = Carbon::createFromFormat('d/m/Y', $data);
        return $dtCarbon->format('Y-m-d');
    }

}
