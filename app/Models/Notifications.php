<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'notifications';
    public static function  getNotifications($id){
        //get user_id 5 from user model
        User::find($id);
        $mentor = Mentor::where('user_id', $id)->first();
        // $notifications = Notifications::where('mentor_id', $id)->get();
        $d = \DB::table('notifications')->where('notifiable_id', $mentor->id)->where('notifiable_type', 'App\Models\Mentor')->where('read_at', NULL)->take(5)->get();
        if (count($d) > 0) {
            # code...
            foreach ($d as $key => $value) {
                # code...
                $notifications[] = $value;
            }
            //need to use this data in the header as json
            return $notifications;
        }else{
            $notifications = [];
            return $notifications;
        }
        // foreach ($d as $key => $value) {
        //     # code...
        //     $notifications[] = $value;
        // }
        // //need to use this data in the header as json
        // return $notifications;

        // return view('notifications.index', compact('notifications'));
    }

    //mark all notifications as read
    // markAsRead
    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->forceFill(['read_at' => $this->freshTimestamp()])->save();
        }
    }


}
