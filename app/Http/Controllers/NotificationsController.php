<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   //
   public function index()
   {
       $user = auth()->user()->id;
       $mentor = Mentor::where('user_id', $user)->first();
       if(!$mentor){
        return redirect()->back()->with('error', 'You are not authorized to view this page');
       }
       $notifications = Notifications::where('notifiable_id', $mentor->id)->where('notifiable_type', 'App\Models\Mentor')->get();
    //    $notifications = auth()->user()->notifications;
       return view('notifications.index', compact('notifications'));
   }

   public function show($id){
       $notification = auth()->user()->notifications()->where('id', $id)->first();
       return view('notifications.show', compact('notification'));
   }
//    get notifications of a specific mentor


   public static function all()
   {
       # code...
       return auth()->user()->notifications;
   }

   //destroy notification
   public function destroy($id){
       $notification = auth()->user()->notifications()->where('id', $id)->first();
       $notification->delete();
       return redirect()->back()->with('success', 'Notification deleted successfully');
   }

   //mark all notifications as read
   public function markAllAsRead(){
      $user = auth()->user()->id;
      $mentor = Mentor::where('user_id', $user)->first();
        $notifications = Notifications::where('notifiable_id', $mentor->id)->where('notifiable_type', 'App\Models\Mentor')->where('read_at', NULL)->get();
            foreach ($notifications as $key => $value) {
                # code...
                $value->markAsRead();
            }
    //    auth()->user()->unreadNotifications->markAsRead();
       return redirect()->back()->with('success', 'All notifications marked as read');
   }

   //mark single notification as read
   public function markAsRead($id){
       $notification = auth()->user()->notifications()->where('id', $id)->first();
       $notification->markAsRead();
       return redirect()->back()->with('success', 'Notification marked as read');
   }

}
