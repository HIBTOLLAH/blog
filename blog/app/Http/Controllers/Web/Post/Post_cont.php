<?php

namespace App\Http\Controllers\Web\Post;
use App\Models\Model\post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User ;
use App\Models\Model\comment;
use App\Models\Model\Section;
class Post_cont extends Controller

{
  public function index(Request $request ,$id){
    $post=post::find($id);
    if ($request->isMethod('post')) {
     $post->Comment()->create([
       'content'=>$request->input('content'),
       'user_id'=>Auth::user()->id

     ]);
     return redirect()->back();
    }
    else{
     $arr['post']=$post;
    return view('Web.Post.Index_view',$arr);
    }

  }
  public function editComment(Request $request , $id ){
    $comment= comment::find($id);

    $section = $comment->post->Section;
    $post = $comment->post;
     /** @var \App\Models\User $user */
    $user=Auth::user();

    if( $request->isMethod('post')){
     $comment->update($request->all());
     return redirect(route('Web.Post.Index',['id'=>$post->id]));
} else {
    $arr['comment']=$comment ;
    $arr['post']=$post ;
    return view ('Web.Post.Edit_comment_view',$arr);
}
    }
    public function deleteComment($id){
        $comment= comment::find($id);

   


    $comment->delete();
    return redirect()->back();
    }
  }

