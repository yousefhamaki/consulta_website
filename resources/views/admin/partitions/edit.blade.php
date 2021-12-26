<?php

foreach($partition as $d){
    if(isset($d->name)){
        $name = $d->name;
    }else{
        $name = "";
    }


    if(isset($d->id)){
        $id = $d->id;
    }else{
        $id = "";
    }
}
?>

@extends('admin.admin')

@section('title')
    تعديل
@stop

@section('content')
<small id='active_button_bage' data-value='2'></small>
    <form method="POST" action="{{ url( MANAGE . '/partitions/edit/' . $id) }}" enctype='multipart/form-data'>
                        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Partition name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text"
                     class="form-control @error('name') is-invalid @enderror" 
                     name="name" value="{{ $name }}" 
                     required autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
<br/>
        <div class="form-group row">
            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <input id="img" type="file" 
                    class="form-control @error('img') is-invalid @enderror" 
                    name="img" 
                    required>

                        @error('img')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
<br/>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('تعديل القسم') }}
                </button>
            </div>
        </div>
    </form>
@stop