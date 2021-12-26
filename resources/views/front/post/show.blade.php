@extends('front.layout.app')

@section("title")
    post
@stop

@section("styles")
    <style>
        body{
            background-color: white;
            background-image: url("") !important;
        }
        .post_area{
            width: 75%;
            direction: rtl;
        }
        .app_content{
            direction: rtl;
        }
        img{
            max-width: 100%;
        }
        .post_img{
            display: flex;
            flex-wrap: wrap;
        }
    </style>
@stop

@section("content")
    @foreach($data as $d)
        <div class="post_area">
            <h2 class="post_title">{{ $d->title }}</h2>
            <div class="post_img">
                @foreach(json_decode($d->img) as $p)
                    <img src="{{ url('images/posts/' . $p->img) }}" alt="{{ $d->title }}">
                @endforeach
            </div>
            <div class="content_area">
            {!! $d->content !!}
            </div>
        </div>
    @endforeach
@stop