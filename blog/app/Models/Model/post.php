<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Model;
 


class post extends Model
{
    protected $table='posts';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'title',
        'content',
        'section_id',
        'user_id',
    ];
    public function Section(){
        return $this->belongsTo('App\Models\Model\Section');
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Comment(){
        return $this->hasMany('App\Models\Model\comment');
    }
    public function photo(){
        return $this->belongsToMany('App\Models\Model\photo' , 'post_photo');
    }
}
