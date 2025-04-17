<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Model\Section;

class Section_po
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function before( User $user){
        if($user->role=='admin'){
            return true ;
        }

    }
    public function add_post( User $user , Section $section){
    if($user->id== $section ->admin ){
        return true ;
    }
    return false ;
    }
}
