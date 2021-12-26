@extends('admin.contract.contract')
@section('title')
    إضافة فرع جديد
@stop


@section('content')
    <small id='active_button_bage' data-value='7'></small>
    <form method="POST" action="{{ url( MANAGE . '/contracts/branches/add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('branch name') }}</label>

                            <div class="col-md-6">
                                <input id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch') }}" required autofocus>

                                @error('branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<br/>
                        <div class="form-group row">
                            <label for="section" class="col-md-4 col-form-label text-md-right">{{ __('Seclect section') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section"> -->
                                <select name="section" id="section" class="form-control @error('section') is-invalid @enderror">
                            @foreach($sections as $section)        
                                <option value="{{$section->id}}">{{$section->section}}</option>
                            @endforeach
                                </select>
                                @error('section')
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
                                    {{ __('إضافة الفرع') }}
                                </button>
                            </div>
                        </div>
                    </form>
@stop