<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admins;
use App\Models\NotificationA;

class Events extends Controller
{
    public function status(Request $data, $event, $table, $id)
    {
        $user = Auth::guard('admin')->user()->id;
        $name = Auth::guard('admin')->user()->name;
        if($event == "verify" || $event == "stop"){

            if($event == "verify"){
                $status = 1;
                $msg = 'تم التفعيل بنجاح';
                $err = 'فشل فى التفعيل';
                $type = 0;
                $notification_message = $name . " verified the row number " . $id . "in table " . $table; 
            }else{
                $status = 0;
                $msg = 'تم الإيقاف بنجاح';
                $err = 'فشل فى الإيقاف';
                $type = 1;
                $notification_message = $name . " canceled verify of the row number " . $id . "in table " . $table; 
            }
            $partition = DB::table($table)->where("id", "=", $id)->update(["status" => $status]);
        }else if($event == "remove"){
            $partition = DB::table($table)->where("id", "=", $id)->delete();
            $msg = 'تم الحذف بنجاح';
            $err = 'فشل فى الحذف';
            $type = 2;
            $notification_message = $name . " removed the row number " . $id . "in table " . $table; 
        }else{
            return "error 404";
        }
        if($partition){
            $admins = Admins::select("id")->get();
            foreach($admins as $d){
                NotificationA::insert([
                    'from_id' => $user,
                    'to_id' => $d->id,
                    'type' => $type,
                    'notification' => $notification_message,
                    'rank_from' => 2
                ]);
            }
            return redirect()->back()->with('success', $msg);
        }else{
            return redirect()->back()->with('error', $err);
        }
    }
}
