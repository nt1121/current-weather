<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'prefectures';

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function locations()
    {
        return $this->hasMany('App\Location');
    }
}
