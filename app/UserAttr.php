<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttr extends Model
{
    protected $connection = 'mysql';

    protected $primaryKey = 'user_id';
}
