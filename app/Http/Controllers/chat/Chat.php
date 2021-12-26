<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Traits\Offertrait;
use Illuminate\Support\Facades\Input;

class Chat extends Controller
{
    use Offertrait;
    public function index()
    {
        $rooms_info = ChatRoom::where("user_id", "=", auth::user()->id)->get();
        return view("front.chat.rooms", compact("rooms_info"));
    }

    public function get_room_info($room)
    {
        $room_messages = ChatMessage::where("chat_room_id", "=", $room)->get();
        $room_info = ChatRoom::where("room_id", "=", $room)->get();

        foreach($room_info as $d){
            if($d->user_id == Auth::user()->id){
                return view("front.chat.index", compact("room_info", "room_messages"));
            }else{
                return redirect('/');
            }
        }
        
    }

    public function send_message(request $request, $room)
    {
        $status = ChatRoom::where("room_id", "=", $room)->where("status", "=", 1)->get();
        if(count($status) > 0){
            if($request->message !== null){
                $files_name = [];
                if($request->hasFile('files')){
                    $files = $request->file('files');
                    foreach($files as $data){
                        $filename = $this->saveimage($data, 'data/messages_files', auth::user()->name);
                        $files_name[] = ["file" => $filename];
                    }
                }
                $final = json_encode($files_name);
                $message = ChatMessage::insert([
                    'chat_room_id' => $room,
                    'user_id' => auth::user()->id,
                    'message' => $request->message,
                    'files' => $final,
                ]);
                if($message){
                    $stat = 1;
                    $msg = "تم إرسال الرسالة بنجاح";
                }else{
                    $stat = 0;
                    $msg = "فشل إرسال الرسالة";
                } 
            }else{
                $stat = 0;
                $msg = "لا يمكنك إرسال رسالة فارغة";
            }
        }else{
            $stat = 0;
            $msg = "برجاء إعادة تحميل الصفحة";
        }
        return response()->json([
            'status' => $stat,
            'msg' => $msg
        ]);
        
    }

    public function get_new_messages(request $request)
    {
        return $request;
    }
}
