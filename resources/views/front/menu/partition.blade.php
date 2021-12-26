@extends('front.layout.app')

@section("title")
    {{ $name_p }}
@stop

@section("styles")
<link rel='stylesheet' href="{{ asset('css/law.css') }}" />
    <style>
        .partition_title{
            text-align: right;
            padding: 0 5%;
            color: #72467b;
            text-shadow: 0px -2px yellow;
        }
        .p_container{
            width: 80%;
            margin: 25px auto;
            text-align: center;
            background-color: #6a3473;
            padding: 10px;
            border-radius: 20px;
            box-shadow: 3px 3px #ffff009e;
            max-width: 700px;
        }
        .p_content{
            background-color: white;
            color: black;
            padding: 10px;
            max-width: 600px;
            margin: 20px auto;
            cursor: pointer;
            border-radius: 10px;
        }
    </style>
@stop

@section("content")
    <h2 class="partition_title">{{ $name_p }}</h2>

    <div class="p_container">
        @foreach($data as $d)
        <div class="p_content law_value">
            <h3 data-id="{{ $d->id }}">{{ $d->name }}</h3>
        </div>
        @endforeach
    </div>
@stop