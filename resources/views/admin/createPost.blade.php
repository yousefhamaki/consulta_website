@extends('admin.admin')

@section('title')
  إضافة منشور جديد
@stop
@section('content')
<style>
    #postcontent{
        width: 103%;
        resize: none;
        outline: none;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .input_area{
        margin-bottom: 10px;
    }
</style>
<small id='active_button_bage' data-value='5'></small>
<form method='POST' id='insert_form'
action='{{url( MANAGE . "/posts/insert")}}'
enctype='multipart/form-data'
>
    @csrf
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Post title</label>
    <div class="col-sm-10 input_area">
      <input type="text" class="form-control offer_name" name='title' 
      @if(isset($post))
      value='{{ $post->name}}'
      @endif 
      placeholder="Post title">
      <small class='title_err'></small>
    </div>

    <div class="form-group row">
        <label for="inputcontent" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10 input_area">
        <textarea name="content" id="postcontent" cols="30" rows="10"></textarea>
        <small class='content_err'></small>
        </div>
    </div>

    <label for="inputphoto3" class="col-sm-2 col-form-label">Post images</label>
    <div class="col-sm-10 input_area">
      <input type="file" 
      class="form-control offer_photo" 
      name='img[]' 
      @if(isset($post))
      value='{{ $post->img}}'
      @endif 
      multiple>
      <small class='img_err'></small>
    </div>
  </div>
    
  <div class="form-group row input_area">
    <div class="col-sm-10">
      <button type="submit" id='addpost' class="btn btn-primary add_offer">Upload</button>
    </div>
  </div>
</form>
@stop
@section('scripts')
<script src="{{ asset('js/createpost.js')}}"></script>
@stop