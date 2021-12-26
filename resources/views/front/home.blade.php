<?php
use App\Models\Menu\Partition;
use App\Models\Post;

$partitions = Partition::where("status", "=", "1")->get();

$posts = Post::orderBy("created_at", "DESC")->paginate(10);

?>
@extends('front.layout.app')

@section("title")
    Consulta
@stop

@section("styles")
    <link rel='stylesheet' href="{{ asset('css/partitions.css') }}" />
@stop

@section("content")
    <div class="home">
        <!-- partitions -->
        @foreach($partitions as $part)
        <div class="main_section">
            <section class="main_sec_name">
            <h2>{{ $part->name }}</h2>
            </section>
            <section class="img_sec">
            <img src="{{ url('images/partitions/' . $part->img) }}" alt="partition img" />
            </section>

        @if($part->link !== null)
            <!-- <a href="{{ url($part->link) }}"><div>  </div></a> -->
            <div class="link_value link" data-link="{{ url($part->link) }}"></div>
        @else
        <!-- <a href="{{ url('/partition/' . $part->id) }}"><div> </div></a> -->
        <div class="link_value link" data-link="{{ url('/partition/' . $part->id) }}"></div>
        @endif
        </div>
        @endforeach

        <!-- posts -->
        <div class="container">
            <div class="header_area_posts">أخبار كونسولتا 
            <img src="{{ url('data/home/news.png') }}" style="position: static; width:50px;" alt="">
            </div>
            <div class="posts_area">
            @foreach($posts as $post)
                <div class="post_area" data-id="{{$post->id}}">
                    <div class="post_img">
                    <img src="{{ url('images/posts/' . json_decode($post->img)[0]->img ) }}" alt="" />
                    </div>
                    <div class="content_post">
                    <div class="post_title">{{ $post->title }}</div>
                    <div class="post_content">{!! substr($post->content, 0, 600) !!}  <a href="{{ url('post/' . $post->id) }}">...قراءه المزيد</a></div>
                    </div>
                </div>
            @endforeach
            </div>
            {{ $posts->links() }}
        </div>
        <a href="" class="link_go" style="display: none;">link</a>
    </div>
@stop

@section("scripts")
    <script src="{{ asset('js/home.js') }}"></script>
@stop