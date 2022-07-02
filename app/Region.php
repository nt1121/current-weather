<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'regions';

    public function prefectures()
    {
        return $this->hasMany('App\Prefecture');
    }
}
