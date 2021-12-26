@extends('admin.contract.contract')
@section('title')
    إضافة عقد جديد
@stop


@section('content')
    <small id='active_button_bage' data-value='7'></small>
    <form method="POST" action="{{ url( MANAGE . '/contracts/add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="contract" class="col-md-4 col-form-label text-md-right">{{ __('Contract name') }}</label>

                            <div class="col-md-6">
                                <input id="contract" type="text" class="form-control @error('contract') is-invalid @enderror" name="contract" value="{{ old('contract') }}" required autofocus>

                                @error('contract')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<br/>
<div class="form-group row">
                            <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Seclect branch') }}</label>

                            <div class="col-md-6">
                                <select name="branch" id="branch" class="form-control @error('branch') is-invalid @enderror">
                            @foreach($sections as $section)        
                                <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                                </select>
                                @error('branch')
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
                                    {{ __('إضافة العقد') }}
                                </button>
                            </div>
                        </div>
                    </form>
@stop