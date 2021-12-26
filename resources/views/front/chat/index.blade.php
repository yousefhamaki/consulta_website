@extends('front.layout.app')
<?php
use Illuminate\Support\Facades\Auth;
?>
@section("title")
    chat
@stop


@section("styles")
    <link rel="stylesheet" href="{{ asset('css/chats.css') }}">
@stop

@section("content")
@foreach($room_info as $d)
<?php
    $status = $d->status;
    $id = $d->room_id;
?>
<span class="messages_link" data-link="{{ url('chat/get_new_messages/' . $id) }}"></span>
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
@endforeach
<section class="chat_area messages_area">
    <h2>Room messages</h2>
    @if($status == 0)
    <h4>برجاء الأنتظار حتى يتم فتح الغرفة</h4>
    @else
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
                <h3 class="username_sender">{{ auth::user()->name }}</h3>
            </section> 
        @endif
        </section>
            <section class="message_area">
                {{ $d->message }}
            </section>
        </section>
    @endforeach
   
    </section>
    @endif
    
</section>
@if($status == 1)
<section class="chat_area" style="margin-top: 20px;">
    <section class="send_message">
        <h2>Send new message</h2>
        <form action="{{ url('chat/send_message/' . $id) }}" method="post" id="send_message_form"  enctype='multipart/form-data' class="form_sending">
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
@endif
@stop

@section("scripts")
    <script src="{{ asset('js/chat_room.js') }}"></script>
@stop