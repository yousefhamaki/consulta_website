<?php
    $options = [
        "law",
        "posts",
        "consult"
    ];
?>

@extends('admin.admin')

@section('title')
  Consulta team
@stop

@section('content')
<small id='active_button_bage' data-value='9'></small>

<h2>Add new user</h2>

<form method="POST" action="{{ url('$2y$10KzYrXJ5fAbKzgZhPwpVpVbrsi9xxXckqebZCaCCVZH0UgYEYOuTe/admin/add') }}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

    </div>
<br />
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    </div>
    <br />
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    </div>
    <br />
    <div class="form-group row">
        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('options') }}</label>

            <div class="col-md-6">
                @for($i = 0; $i < count($options); $i++)
                    <input id="{{ 'option' . $i }}" type="checkbox" name="option[]" value="{{ $options[$i] }}">
                    <label for="{{ 'option' . $i }}">{{ $options[$i] }}</label>
                    <br>
                @endfor
            </div>
    </div>
    <br />
    <div class="form-group row">
        <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('salary') }}</label>

            <div class="col-md-6">
                <input id="salary" type="number" class="form-control" name="salary" required>
                @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    </div>
    <br />
    <div class="form-group row">
        <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job title') }}</label>

            <div class="col-md-6">
                <input id="job_title" type="text" class="form-control" name="job_title" required>
                @error('job_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    </div>
    <br />
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Add') }}
            </button>

        </div>
    </div>
</form>
@stop