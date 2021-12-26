<?php
$checked = json_decode($partition[0]->connect);

?>
@extends('admin.admin')

@section('title')
  connection
@stop

@section('content')
<small id='active_button_bage' data-value='2'></small>
<form method="POST" action="{{ url( MANAGE . '/partitions/connect') }}" enctype='multipart/form-data'>
                        @csrf
        <input type="hidden" name="id" value="{{ $partition[0]->id }}">
        <div class="form-group row">
            <label for="partition" class="col-md-4 col-form-label text-md-right">{{ __('Partition') }}</label>

                <div class="col-md-6">
                    {{ $partition[0]->name }}
                </div>
        </div>
<br/>
        <div class="form-group row">
            <label for="connection" class="col-md-4 col-form-label text-md-right">{{ __('Connection') }}</label>

                <div class="col-md-6">
                    @foreach($elements as $d)
                        <input type="checkbox" 
                        name="connection[]" 
                        id="{{ $d->id }}"
                        value="{{ $d->id }}">
                        <label for="{{ $d->id }}">{{ $d->name }}   ( {{ $d->menu->name }} )</label>
                        <br />
                    @endforeach
                </div>
        </div>
<br/>
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('connect') }}
                </button>
            </div>
        </div>
    </form>

@stop

@section("scripts")

@if($checked !== null)
@foreach($checked as $d)
    <script>
        document.getElementById('{{ $d->id }}').checked = true;
    </script>
@endforeach
@endif
@stop