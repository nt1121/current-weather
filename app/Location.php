<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'locations';

    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture');
    }
}
