<?php

namespace App\Http\Controllers\Admin\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Model\Section;
use Illuminate\Console\View\Components\Secret;

use function PHPUnit\Framework\isNull;

class Section_cont extends Controller
{
 public function add( Request $request){
    if($request->isMethod('post')){
     $section= Section:: create($request->all());
     if(!empty($request->input('admin'))){
        $user=User::find($request->input('admin'));
        $user->role='editor';
        $user->save();
     }
      return redirect()->back();
    }else{
        $users=User::select('id','name')->where('role','user')->get();
    $arr['users']=$users;
    return view('Admin.Section.Add_view',$arr);
    }

 }
 public function update(Request $request, $id) {
    $section = Section::find($id);

    if ($request->isMethod('post')) {
        // التحقق من أن القيم المدخلة ليست فارغة
        $name = $request->input('name');
        $adminId = $request->input('admin');

        // التحقق من أن name غير فارغ
        if (empty($name)) {
            return redirect()->back()->withErrors(['name' => 'The name field is required.']);
        }

        // تحديث العمود name
        $section->name = $name;

        // التحقق من admin
        if (!empty($adminId) || $section->admin != $adminId) {
            // إذا كان هناك admin سابق، إعادة تعيين دوره إلى user
            if (!empty($section->admin)) {
                $old_admin = User::find($section->admin);
                if ($old_admin) {
                    $old_admin->role = 'user';
                    $old_admin->save();
                }
            }

            // تحديث العمود admin في الجدول sections
            $section->admin = $adminId;

            // إذا كان هناك admin جديد، تحديث دوره إلى editor
            if (!empty($adminId)) {
                $new_admin = User::find($adminId);
                if ($new_admin) {
                    $new_admin->role = 'editor';
                    $new_admin->save();
                }
            }
        }

        // حفظ التغييرات
        $section->save();

        return redirect()->back()->with('success', 'Section updated successfully.');
    } else {
        // عرض النموذج GET
        $users = User::select('id', 'name')->where('role', 'user')->get();
        $arr['users'] = $users;
        $arr['section'] = $section;
        return view('Admin.Section.Update_view', $arr);
    }
}
public function index(){
    $sections = Section::select('id','name','admin')->get();
    $arr['sections']=$sections;

    return view ('Admin.Section.Index_view' , $arr);
}
public function delete(Request $request , $id){
    $section= Section:: find($id);
    if($request->isMethod('post')){
     $section->delete();
     return redirect(route('Section.Index'));

    }else{
        $arr['section']=$section;
        return view('Admin.Section.Delete_view' ,$arr);
    }
}
}
