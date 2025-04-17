<?php

namespace App\Http\Controllers\Admin\Post;
use App\Models\Model\Section;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\photo;
use App\Models\Model\post;
use Illuminate\Support\Facades\Auth;
class Post_cont extends Controller
{
    public function index(){
        $posts=post::where('section_id','like' ,$this->getFlag())->get();
        $arr['posts']=$posts;
        return view('Admin.post.Index_view' , $arr);
    }
    public function add(Request $request)
    {
         /** @var \App\Models\User $user */
         $user = Auth::user();
        if ($request->isMethod('post')) {

                $section =Section :: find($request->input('section_id'));

                    $post=$user->posts()->create($request->all());
                    $post->photo()->attach($request->input('photo'));
                    return redirect()->back();
                }

         else {


            $sections = Section::where('id','like' , $this->getFlag())->get();

            $photos = photo::all();
            return view('Admin.Post.Add_view', compact('sections', 'photos'));
        }
    }

    public function getFlag(){

         /** @var \App\Models\User $user */
         $user = Auth::user();
        $flag='%';
        if($user->role=='editor'){
            $flag=$user->Section->id ;
        }
        return $flag ;
    }
    public function update(Request $request, $id)
{
    $post = post::find($id);



        if ($request->isMethod('post')) {
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->section_id = $request->input('section_id');
            $post->save();

            $post->photo()->detach();
            $post->photo()->attach($request->input('photos'));

            return redirect()->route('Post.Index')->with('success', 'Post updated successfully.');
        } else {
            $photos = photo::all();
            $sections = Section::where('id', 'like', $this->getFlag())->get();
            return view('Admin.Post.Update_view', compact('post', 'sections', 'photos'));
        }
    }
    public function delete(Request $request , $id){
        $user=Auth::user();
        $post=post::find($id);
        $section=$post->Section ;
        if ($request->isMethod('post')) {
            $post->photo()->detach();
            $post->delete();
            return redirect(route('Post.Index'));
        } else{
            $arr['post']=$post;
            return view('Admin.Post.Delete_view',$arr);
        }



    }
}

