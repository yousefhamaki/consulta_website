@extends('admin.admin')

@section('title')
  إضافة عرض جديد
@stop
@section('content')
<small id='active_button_bage' data-value='2'></small>
<form method='post' id='insert_form'
action='{{url("admin/create-offer")}}'
enctype='multipart/form-data'
>
    @csrf
    <!-- <input name='__token' value='{{csrf_token()}}' /> -->
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">offer name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control offer_name" name='name' 
      @if(isset($offer))
      value='{{ $offer->name}}'
      @endif 
      placeholder="Email">
      <small class='name_err'></small>
    </div>

    <label for="inputphoto3" class="col-sm-2 col-form-label">offer Photo</label>
    <div class="col-sm-10">
      <input type="file" class="form-control offer_photo" name='photo' 
      @if(isset($offer))
      value='{{ $offer->photo}}'
      @endif >
      <small class='photo_err'></small>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control offer_price" name='price' 
      @if(isset($offer))
      value='{{ $offer->price}}'
      @endif
      placeholder="Password">
      <small class='price_err'></small>
    </div>
  </div>
    
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary add_offer">Upload</button>
    </div>
  </div>
</form>

@endsection

@section('scripts')
<script src='{{url("js/offers.js")}}'></script>
@stop