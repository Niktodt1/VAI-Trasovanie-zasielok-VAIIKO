<?php

namespace App\Models;

class ErrorMessenger extends \App\Core\Model
{
    public function message(\Exception $e) {
        echo "Something BAD happened! Contact the developer of this website please, and give him this message:\n";
        echo $e->getMessage();
    }
}