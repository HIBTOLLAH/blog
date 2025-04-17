<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table='sections';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'name',
        'admin',
    ];
    public function Admin(){
        return $this->belongsTo('App\Models\User','admin');
    }
    public function posts(){
        return $this->hasMany('App\Models\Model\post');
    }
}
