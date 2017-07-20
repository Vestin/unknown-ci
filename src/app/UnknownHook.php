<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnknownHook extends Model
{

    public function parseRequest()
    {
        return json_decode($this->request,true);
    }

}
