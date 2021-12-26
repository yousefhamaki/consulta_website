@extends('admin.admin')

@section('title')
    Menu
@stop

@section('options')
<style>
    .section_options{
        position: relative;
        padding: 5px;
        /* right: 23px; */
        margin-top: 6px;
        background-color: #212529;
        color: white;
        border-radius: 2px;
        box-shadow: 0 2px 6px 0 hsl(0deg 0% 0% / 20%);
        border: 0;
        width: max-content;
    }
     ul{
        list-style: none;
        padding: 0;
        margin-bottom: 0;
    }
    ul li{
        padding: 5px;
    font-size: 15px;
    }
    ul li:hover{
        background-color: white;
        color: #212529;
    }
    .options_button{
        margin-right: 5px;
        outline: none;
    }
    .options_button:focus{
        box-shadow: none;
    }
</style>
<div class="btn-toolbar mb-2 mb-md-0">
<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle options_button">
    <span data-feather="calendar"></span>
        إظهار
    <section class='section_options hide'>
        <ul>
            <a href="{{url( MANAGE . '/menu')}}"><li>القائمة</li></a>
            <a href="{{url( MANAGE . '/menu/fork')}}"><li>فروع القائمة</li></a>
            <a href="{{url( MANAGE . '/menu/forks/fork')}}"><li>تفرعات الفروع</li></a>
            <a href="{{url( MANAGE . '/menu/forks/forks/fork')}}"><li>تفرعات التفرعات</li></a>
        </ul>
    </section>
</button>
<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle options_button">
    <span data-feather="calendar"></span>
        إضافة
    <section class='section_options hide'>
        <ul>
        <a href="{{url( MANAGE . '/menu/add')}}"><li>القائمة</li></a>
            <a href="{{url( MANAGE . '/menu/add/fork')}}"><li>فروع القائمة</li></a>
            <a href="{{url( MANAGE . '/menu/add/forks/fork')}}"><li>تفرعات الفروع</li></a>
            <a href="{{url( MANAGE . '/menu/add/forks/forks/fork')}}"><li>تفرعات التفرعات</li></a>
        </ul>
    </section>
</button>
</div>
@stop


@section('scripts')
    <script src="{{asset('js/contract.js')}}"></script>
@stop