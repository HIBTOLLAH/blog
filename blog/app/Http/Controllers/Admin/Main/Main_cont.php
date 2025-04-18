<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\post;
use App\Models\Model\comment;
use App\Models\User;

class Main_cont extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name')->orderBy('id', 'desc')->take(2)->get();
        $posts = post::select('id', 'title')->orderBy('id', 'desc')->take(2)->get();
        $comments = comment::orderBy('id', 'desc')->take(2)->get();

        // send data to view
        return view('Admin.Main_view', compact('users', 'posts', 'comments'));
    }
}


