<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table='photos';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
       'path',
    ];
    public function Posts(){
        return $this->belongsToMany('App\Models\Model\post' ,'post_photo');
    }
}
