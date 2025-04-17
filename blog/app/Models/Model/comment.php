<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table='comments';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'content',
        'post_id',
        'user_id',
    ];
    public function post(){
        return $this->belongsTo('App\Models\Model\post');
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
