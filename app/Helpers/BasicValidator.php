<?php

namespace App\Helpers;

use Exception;

class BasicValidator{

    public static function isValueNull($value){
        if(is_null($value) || empty($value)) {
            throw new Exception('Hay campos vacios',400);
        }
    }

}

?>