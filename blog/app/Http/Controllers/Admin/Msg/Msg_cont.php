<?php

namespace App\Http\Controllers\Admin\Msg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Msg_cont extends Controller
{
    public function index($type)
    {
        $user = Auth::user();
        $msgs = [];

        if ($user) {
            switch ($type) {
                case 'All':
                    $msgs = $user->notifications;
                    break;
                case 'Read':
                    $msgs = $user->readNotifications;
                    break;
                case 'Unread':
                    $msgs = $user->unreadNotifications;
                    break;
            }
        }

        return view('Admin.Msg.Index_view', ['msgs' => $msgs]);
    }
    public function read($id){
        $user = Auth::user();
        $msg = $user->notifications->find($id);
        $msg->markAsRead();
        if (!$msg) {
            return redirect()->back()->with('error', 'Notification not found.');
        }

        return view('Admin.Msg.Read_view', ['msg' => $msg]);
    }
    public function dalete($id){
        $user = Auth::user();
        $msg = $user->notifications->find($id);
        $msg->delete();
        if (!$msg) {
            return redirect()->back()->with('error', 'Notification not found.');
        }

        return redirect()->back();
    }
}

