@extends('admin.admin')

@section('title')
    إضافة خاصية جديدة
@stop


@section('content')
<small id='active_button_bage' data-value='6'></small>
    <form method="POST" action="{{ url( MANAGE . '/consulta_options/add') }}" enctype='multipart/form-data'>
                        @csrf
        <div class="form-group row">
            <label for="law" class="col-md-4 col-form-label text-md-right">{{ __('أسم الخاصية') }}</label>

                <div class="col-md-6">
                    <input id="law" type="text" class="form-control @error('law') is-invalid @enderror" name="name" value="{{ old('law') }}" required autofocus>

                        @error('law')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
<br/>
        <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('وصف الخاصية') }}</label>

                <div class="col-md-6">
                    <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="details" value="{{ old('content') }}" required autofocus></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
<br/>
        <div class="form-group row">
            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('صورة الخاصية') }}</label>

                <div class="col-md-6">
                    <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="img" value="{{ old('file') }}" required autofocus>

                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
        </div>
        <br/><br/>
        <div class="form-group row">
            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('مدة الخاصية') }}</label>

                <div class="col-md-6">
                    <input id="timet" type="radio" class="" name="time" value="1" required autofocus>
                    <label for="timet">True</label>
                    <br/>
                    <input id="timef" type="radio" class="" name="time" value="0" required autofocus>
                    <label for="timef">False</label>
                        @error('file')
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
                    {{ __('إضافة الخاصية') }}
                </button>
            </div>
        </div>
    </form>
@stop