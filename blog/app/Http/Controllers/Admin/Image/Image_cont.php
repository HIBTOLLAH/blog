<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\photo;

class Image_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
        $photo=$request->file('photo');
        $path =$photo->storeAs('post', $photo->getClientOriginalName() ,'images');
         photo:: create ([
        'path'=>$path
         ]);
          return redirect()->back();
        }else {
            return view('Admin.Image.Add_view');
        }
    }
    public function index(){
        $photos=photo:: all();
        $arr['photos']=$photos ;
        return view('Admin.Image.Index_view',$arr);
    }
    public function delete(Request $request , $id){
        $photo= photo:: find($id);
        if($request->isMethod('post')){
            try{
                unlink(public_path('/images/'.$photo->path));
                $photo->delete();
            }catch (\Exception $exception){

            }

         return redirect(route('Image.Index'));

        }else{
            $arr['photo']=$photo;
            return view('Admin.Image.Delete_view' ,$arr);

}
    } }
