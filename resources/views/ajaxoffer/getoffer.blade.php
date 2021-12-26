@extends('admin.admin')

@section('title')
    Offers
@stop

@section('options')
    <button class='btn btn-success'><a href="{{ url( MANAGE . '/offers/add')}}"> إضافة عرض جديد</a></button>
@stop

@section('content')
<small id='active_button_bage' data-value='2'></small>
<div class="d-flex justify-content-center">
    {!! $offers->links() !!}
</div>
<table class='table'>
    <thead>
        <td scope='col'>id</td>
        <td scope='col'>name</td>
        <td scope='col'>price</td>
        <td scope='col'>photo</td>
        <td>options</td>
    </thead>
    <tbody>
        @foreach($offers as $offer)
        <tr id='{{ "offer" . $offer->id }}'>
            <th scope='row'>{{ $offer->id }}</th>
            <td>{{ $offer->name }}</td>
            <td>{{ $offer->price }}</td>
            <td>
                @if($offer->photo !== NULL)
                <img src='{{ url("images/offers/" . $offer->photo) }}' />
                @else
                    NULL
                @endif
            </td>
            <td>
                <button class="btn btn-success"><a href="{{url(MANAGE . '/offers/edit/' . $offer->id )}}">{{__(key:'messages.Update')}}</a></button>
                <button class="btn btn-danger remove_offer" data-value='{{$offer->id}}'>{{__(key:'messages.Delete')}}</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $offers->links() !!}
</div>
@endsection

@section('scripts')
<script src="{{url('js/updateoffers.js')}}"></script>
@endsection