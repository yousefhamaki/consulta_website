<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Models\User;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use App\Traits\Offertrait;

class Orders extends Controller
{
    use Offertrait;
    public function index()
    {
        return view('admin.orders.index');
    }
    public function chat()
    {
        $rooms_info = ChatRoom::get();
        return view("front.chat.rooms", compact("rooms_info"));
    }
    public function show_chat($id)
    {
        $room_info = ChatRoom::where("room_id", "=", $id)->get();
        $room_messages = ChatMessage::where("chat_room_id", "=", $id)->get();
       return view("admin.orders.show_chat", compact("room_info", "room_messages"));
    }

    public function send_messsage(request $request, $room)
    {
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
                    'admin_id' => auth::guard('admin')->user()->id,
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
        return response()->json([
            'status' => $stat,
            'msg' => $msg
        ]);
        
    }
}
