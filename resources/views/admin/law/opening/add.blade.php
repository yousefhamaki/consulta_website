@extends('admin.admin')

@section('title')
    إضافة إفتتاحية جديدة
@stop

@section('content')
<small id='active_button_bage' data-value='6'></small>
    <form method="POST" action="{{ url( MANAGE . '/law/opening/add') }}">
                        @csrf
        <div class="form-group row">
            <label for="Law_id" class="col-md-4 col-form-label text-md-right">{{ __('Law name') }}</label>

                <div class="col-md-6">
                    <input id="Law_id" type="number" class="form-control @error('law') is-invalid @enderror" name="law" value="{{ old('law') }}" required autofocus>

                        @error('Law_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
<br/>
        <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Law content') }}</label>

                <div class="col-md-6">
                    <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autofocus></textarea>
                        @error('content')
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
                    {{ __('إضافة الإفتتاحية') }}
                </button>
            </div>
        </div>
    </form>
@stop