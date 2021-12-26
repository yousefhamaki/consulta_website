<?php
use Illuminate\Support\Facades\Auth;

$waiting = [];
$opening = [];
$closed = [];

foreach($rooms_info as $d){
    if($d->status == 0){
        $waiting[] = $d;
    }else if($d->status == 1){
        $opening[] = $d;
    }else if($d->status == 2){
        $closed[] = $d;
    }
}
?>
@extends('front.layout.app')

@section("title")
    Chat rooms
@stop

@section("styles")
    <link rel="stylesheet" href="{{ asset('css/chats.css') }}">
    <style>
        h2{
            color: #591f64;
            text-align: center;
        }
        .rooms_container{
            display: flex;
            justify-content: flex-start;
            padding: 0 10%;
            flex-wrap: wrap;
        }
        .rooms_container_data{
            min-width: calc(50% - 25px);
            max-width: max-content;
            min-height: 200px;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
            margin-right: 10px;
            background-color: #ffffffd6;
            box-shadow: 2px 2px 4px 0px #686868;
        }
        .rooms_container_data h2{
            border-bottom: 2px solid #7d5186;
            padding-bottom: 10px;
        }
        .rooms_container_data a{
            color: #7f5388;
            font-weight: bold;
        }
        @media (max-width: 800px) {
            .rooms_container_data{
                min-width: 100%;
            }
        }
        /* .rooms_waiting{
            background-color: yellow;
        }
        .rooms_opening{
            background-color: green;
        }
        .rooms_archive{
            background-color: red;
        } */
        .chat_area{
            box-shadow: 4px 4px 4px 0px #a6a2a29c;
            margin-bottom: 10px;
            cursor: pointer;
            overflow: hidden;
        }
        .chat_area:hover{
            box-shadow: none;
        }
        h4{
            margin-top: 50px;
            text-align: center;
            color: #0000006b;
        }
    </style>
@stop

@section("content")
<!-- <h2 style="text-align: center;">{{ auth::user()->name }} Rooms</h2> -->
<section class="rooms_container">
    <section class="rooms_container_data rooms_waiting">
        <h2>Waiting rooms</h2>
        @if(count($waiting) > 0)
            @foreach($waiting as $d)
            <a href="chat/{{ $d->room_id }}">
                <section class="chat_area" data-id="{{ $d->room_id }}">
                    <p>Time start: {{ $d->time_start }}</p>
                    <p>Time end: {{ $d->time_end }}</p>
                    <p>About: {{ $d->about }}</p>
                </section>
            </a>
            @endforeach
        @else
            <h4>لا يوجد عناصر فى هذه القائمة</h4>
        @endif
    </section>

    <section class="rooms_container_data rooms_opening">
    <h2>Opening rooms</h2>
        @if(count($opening) > 0)
            @foreach($opening as $d)
            <a href="chat/{{ $d->room_id }}">
                <section class="chat_area" data-id="{{ $d->room_id }}">
                    <p>Time start: {{ $d->time_start }}</p>
                    <p>Time end: {{ $d->time_end }}</p>
                    <p>About: {{ $d->about }}</p>
                </section>
            </a>
            @endforeach
        @else
            <h4>لا يوجد عناصر فى هذه القائمة</h4>
        @endif
    </section>

    <section class="rooms_container_data rooms_archive">
        <h2>Closed rooms</h2>
        @if(count($closed) > 0)
            @foreach($closed as $d)
            <a href="chat/{{ $d->room_id }}">
                <section class="chat_area" data-id="{{ $d->room_id }}">
                    <p>Time start: {{ $d->time_start }}</p>
                    <p>Time end: {{ $d->time_end }}</p>
                    <p>About: {{ $d->about }}</p>
                </section>
            </a>
            @endforeach
        @else
            <h4>لا يوجد عناصر فى هذه القائمة</h4>
        @endif
    </section>
</section>

@stop