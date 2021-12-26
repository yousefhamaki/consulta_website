@extends('front.layout.app')

@section("title")
    {{$law[0]->law_name}}
@stop


@section("styles")
<link rel='stylesheet' href="{{ asset('css/law.css') }}" />
<style>
    .law_value{
    background-image: url(../data/home/border.png);
    background-size: 100% 100%;
}
</style>
@stop

@section("content")
    
    <div class='google_ads_area'> إعلانات جوجل</div>

    <div class='law_show'>
        <div class="content_data">
            <h3>{{ $law[0]->law_name }}</h3>
            {!! html_entity_decode($law[0]->content) !!}
        </div>
    <img src="{{ url('data/law_frame.png') }}" class="law_frame" />
    </div>
    
@stop