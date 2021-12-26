@extends('admin.admin')
<?php
use App\Models\User;
?>
@section('title')
    الطلبات
@stop

@section('content')
<small id='active_button_bage' data-value='1'></small>
<link rel="stylesheet" href="{{ asset('css/chats.css') }}">
@foreach($room_info as $d)
<?php
    $user = User::where("id", "=", $d->user_id)->get();

    foreach($user as $da){
        $user_name = $da->name;
    }
    $status = $d->status;
    $id = $d->room_id;
?>

<section class="chat_area" style="margin-bottom: 40px;">
    <section class="room_info">
        <h2>Room information</h2>
        <section class="room_nfo_data">
        <div class="form-group row">
            <label for="room_id" class="col-md-4 col-form-label text-md-right">Room id:</label>
                <div class="col-md-6">
                    <input id="room_id" type="text" class="form-control" readonly value="{{ $id }}">
                </div>
        </div>

        <div class="form-group row">
            <label for="law" class="col-md-4 col-form-label text-md-right">about:</label>
                <div class="col-md-6">
                    <textarea name="" id="" cols="30" rows="10" class="about" readonly>
                    {{ $d->about }}
                    </textarea>
                </div>
        </div>

        <div class="form-group row">
            <label for="law" class="col-md-4 col-form-label text-md-right">Time start:</label>
                <div class="col-md-6">
                    <input id="law" type="text" class="form-control" readonly value="{{ $d->time_start }}">
                </div>
        </div>

        <div class="form-group row">
            <label for="law" class="col-md-4 col-form-label text-md-right">Time end:</label>
                <div class="col-md-6">
                    <input id="law" type="text" class="form-control" readonly value="{{ $d->time_end }}">
                </div>
        </div>

        <div class="form-group row">
            <label for="law" class="col-md-4 col-form-label text-md-right">Total Time:</label>
                <div class="col-md-6">
                    <input id="law" type="text" class="form-control" readonly value="{{ $d->total_time }} min.">
                </div>
        </div>

        <div class="form-group row">
            <label for="law" class="col-md-4 col-form-label text-md-right">Status:</label>
                <div class="col-md-6">
                    @if($status == 0)
                    <input id="law" type="text" class="form-control" readonly value="Not opening yet">
                    @elseif($status == 1)
                    <input id="law" type="text" class="form-control" readonly value="Opening">
                    @elseif($status == 2)
                    <input id="law" type="text" class="form-control" readonly value="Closed">
                    @endif
                </div>
        </div>
        </section>
    </section>
</section>
<section class="chat_area messages_area">
    <h2>Room messages</h2>
    @foreach($room_messages as$d)
    <section class="message_section">
                <section class="user_send">
        @if($d->user_id == null)
            <section class="img_area">
                <img src="{{ url('images/user-avatar.png') }}" alt="" class="user_img">
            </section>
            <section class="name_area">
                <h3 class="username_sender">Consulta_team</h3>
            </section>
        @elseif($d->admin_id == null)
            <section class="img_area">
                <img src="{{ url('images/user-avatar.png') }}" alt="" class="user_img">
            </section>
            <section class="name_area">
                <h3 class="username_sender">{{ $user_name }}</h3>
            </section> 
        @endif
        </section>
            <section class="message_area">
                {{ $d->message }}
            </section>
        </section>
    @endforeach
    </section>
    
</section>

<!-- send messages -->
<section class="chat_area" style="margin-top: 20px;">
    <section class="send_message">
        <h2>Send new message</h2>
        <form action="{{ url(MANAGE . '/orders/chat/send_message/admin_send/' . $id) }}" method="post" id="send_message_form"  enctype='multipart/form-data' class="form_sending">
            @csrf
            <textarea name="message" id="" cols="30" rows="10"></textarea>
            <input type="file" name="files[]" class="hide" multiple id="files_sending">
            <button type="submit" id="send_message">Send message</button>
            <div class="upload_file">
                <i class="bi bi-arrow-up-square-fill"></i>
                Upload multi files
            </div>
            <div class="progress" style="display:none;">
                <div class="progress-bar progress-bar-success progress-bar-striped 
                active" role="progressbar"
                aria-valuemin="0" aria-valuemax="100" style="width:0%">
                0%
                </div>
            </div>
        </form>
    </section>
</section>
@endforeach

@stop

@section("scripts")
    <script src="{{ asset('js/chat_room.js') }}"></script>
@stop