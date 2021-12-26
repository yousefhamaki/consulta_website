@extends('front.layout.app')

@section("title")
    law
@stop


@section("styles")
<link rel='stylesheet' href="{{ asset('css/law.css') }}" />
@stop

@section("content")
    
    <div class='google_ads_area'> إعلانات جوجل</div>

    <div class='container_value'>
        <h2>القوانين المصرية</h2>

        <div class='law_section'>
            <div class="search_area">
                <button class='btn search_button'><i class='fa fa-search'></i></button>
                <input type="search" name="law" class='form-control search_input' id="law_search">
            </div>
            <div class='law_area law_elements_area'>
                @foreach($law as $d)
                <div class="law_value">
                    <h3>{{ $d->law_name }}</h3>
                    <a href="{{ url('law/' . $d->id) }}" class="link"></a>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {!! $law->links() !!}
                </div>
            </div>
            <div class="law_search search_div">
                <div class="exit_search">Exit search</div>
                <div class="search_element_area law_area"></div>

            </div>
        </div>
    </div>
    
@stop

@section("scripts")
<script src="{{ asset('js/law_search.js') }}"></script>
@stop