<?php

namespace App;

use App\ViewModels\ViewModelTrait;
use Illuminate\Database\Eloquent\Model;

class Hook extends Model
{
    use ViewModelTrait;

    Const ACTIVE_ON = 1;
    Const ACTIVE_OFF = 0;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->initViewModel();
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

}
