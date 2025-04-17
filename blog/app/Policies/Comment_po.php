<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Model\comment;
class Comment_po
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function EditComment(User $user , comment $comment){
        if($comment->user_id==$user->id){
            return true ;
        }
return false ;

    }
}
