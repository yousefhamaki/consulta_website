@extends('admin.admin')

@section('title')
  Partitions
@stop

@section('options')
<style>
    .section_options{
        position: relative;
        padding: 5px;
        /* right: 23px; */
        margin-top: 6px;
        background-color: #212529;
        color: white;
        border-radius: 2px;
        box-shadow: 0 2px 6px 0 hsl(0deg 0% 0% / 20%);
        border: 0;
        width: max-content;
    }
     ul{
        list-style: none;
        padding: 0;
        margin-bottom: 0;
    }
    ul li{
        padding: 5px;
    font-size: 15px;
    }
    ul li:hover{
        background-color: white;
        color: #212529;
    }
    .options_button{
        margin-right: 5px;
        outline: none;
    }
    .options_button:focus{
        box-shadow: none;
    }
</style>
<div class="btn-toolbar mb-2 mb-md-0">
<a href="{{ url( MANAGE . '/partitions/add') }}">
<button type="button" class="btn btn-sm btn-outline-secondary">
    Add partition
</button>
</a>
</div>
@stop

@section('content')
<small id='active_button_bage' data-value='2'></small>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Img</th>
                <th scope="col">Connect</th>
                <th scope="col">Status</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partitions as $d)
                <tr>
                    <td scope="row">{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td><img src="{{url('images/partitions/' . $d->img)}}" /></td>
                    <td>
                        <a href="{{ url( MANAGE . '/partitions/connect/' . $d->id) }}">
                            <button class="btn btn-success">ربط</button>
                        </a>
                    </td>
                    <td>
                        @if($d->status == 0)
                            <form action="{{ url( MANAGE . '/event/verify/important_patritions/' . $d->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success">تفعيل</button>
                            </form>
                        @else
                        <form action="{{ url( MANAGE . '/event/stop/important_patritions/' . $d->id) }}" method="post">
                            @csrf    
                            <button class="btn btn-danger">إيقاف</button>
                        </form>
                        @endif
                    </td>
                    <td>    
                        <a href="{{ url( MANAGE . '/partitions/edit/' . $d->id) }}">
                        <button class="btn btn-success answer_report" data-id='{{ $d->id }}'>تعديل</button>
                        </a>
                        <form action="{{ url( MANAGE . '/event/remove/important_patritions/' . $d->id) }}" method="post">
                        @csrf    
                        <button class="btn btn-danger">حذف</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>

@stop