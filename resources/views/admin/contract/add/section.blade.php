@extends('admin.contract.contract')
@section('title')
    إضافة قسم جديد
@stop


@section('content')
    <small id='active_button_bage' data-value='7'></small>
    <form method="POST" action="{{ url( MANAGE . '/contracts/sections/add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="section" class="col-md-4 col-form-label text-md-right">{{ __('Section name') }}</label>

                            <div class="col-md-6">
                                <input id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section" value="{{ old('section') }}" required autofocus>

                                @error('section')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<br/>
                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="text" class="form-control @error('logo') is-invalid @enderror" name="logo">

                                @error('logo')
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
                                    {{ __('إضافة القسم') }}
                                </button>
                            </div>
                        </div>
                    </form>

@stop