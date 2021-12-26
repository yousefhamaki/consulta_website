<?php
if(isset($menu)){
    $data = $menu;
    $url = MANAGE . '/menu/add/menu_forks';
    $label1 = 'Fork';
    $label2 = 'menu';
}else if(isset($fork)){
    $data = $fork;
    $url = MANAGE . '/menu/add/forks_options';
    $label1 = 'Fork fork';
    $label2 = 'Fork';
}else if(isset($fork_option)){
    $data = $fork_option;
    $url = MANAGE . '/menu/add/forks_option_option';
    $label1 = 'Fork option';
    $label2 = 'Fork fork';
}
?>

@extends('admin.menu.index')


@section('content')
<style>
.file_div{
    
    background-color: white;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;

}
#textarea{
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
}
</style>

<small id='active_button_bage' data-value='1'></small>
    <form method="POST" action="{{ url( $url ) }}" enctype='multipart/form-data'>
                        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __($label1) }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
<br/>
@if(isset($fork))
        <div class="form-group row">
            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __("File") }}</label>

                <div class="col-md-6 file_div">
                    <input type="file" name="file">
                </div>
        </div>
<br/>
@endif
<div class="form-group row">
            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __("Content") }}</label>

                <div class="col-md-6 file_div">
                    <textarea name="content" id="textarea" cols="30" rows="10"></textarea>
                </div>
        </div>
<br/>
        <div class="form-group row">
            <label for="label" class="col-md-4 col-form-label text-md-right">{{ __($label2) }}</label>

                <div class="col-md-6">
                    @foreach($data as $d)
                        <input type="radio" name="menu" value="{{ $d->id }}" id="{{ $d->id }}">
                        <label for="{{ $d->id }}">{{ $d->name }}</label>
                        <br/>
                    @endforeach
                </div>
        </div>
<br/>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('إضافة إلى القائمة') }}
                </button>
            </div>
        </div>
    </form>
@stop