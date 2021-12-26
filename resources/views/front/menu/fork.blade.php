<?php
$domain = "http://consulta.com:8000/";

use App\Models\Menu\ForkOption;
foreach($fork as $d){
    $id = $d->id;
    $name = $d->name;
}
// fork_option_option

$options = ForkOption::where("fork_id", "=", $id)->where("status", "=", "1")->with(["fork_option_option" => function($q){
    $q->where("status", "=", "1");
}])->get();

?>
@extends('front.layout.app')

@section("title")
    {{$name}}
@stop

@section("styles")
    <link rel='stylesheet' href="{{ asset('css/law.css') }}" />
    <link rel='stylesheet' href="{{ asset('css/forks.css') }}" />
@stop

@section("content")
    <div class='google_ads_area'> إعلانات جوجل</div>
    <div class='container_value'>
        <h2>{{$name}}</h2>

        <div class='law_section'>
            <div class="search_area">
                <button class='btn search_button'><i class='fa fa-search'></i></button>
                <input type="search" name="law" class='form-control' id="law_search">
            </div>
            <div class='law_area data_area'>
                @foreach($options as $d)
                <div class="law_value">
                    <div class="value_area">
                    <h4>{{ $d->name }}</h4>
                    @if(count($d->fork_option_option) > 0)
                    <span><img src="{{ url('data/home/gt.png')}}"
                    style="width: 30px;
                            height: 30px;
                            position: static;" 
                    alt=""></span>

                    <div class='table-striped'>
                    @foreach($d->fork_option_option as $data)
                        <div class='option_option'>
                            <h6>{{ $data->name }}</h6>
                            <a href="{{ $domain . 'order/' . $data->order . '/' . $data->id }}"></a>
                        </div>
                    @endforeach
                    </div>
                    
                    @elseif($d->order > 0)
                        <a href="{{ $domain . 'order/' . $d->order . '/' . $d->id }}"></a>
                    
                    @endif
                    </div>

                </div>
                @endforeach
            </div>
            <div class="search_result_area law_area"></div>
        </div>
    </div>
@stop

@section("scripts")
<script src="{{ asset('js/forks.js') }}"></script>
<script src="{{ asset('js/menusearch.js') }}"></script>
@stop