@extends('admin.menu.index')


@section('content')
<small id='active_button_bage' data-value='1'></small>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Menu</th>
                <th scope="col">status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                @foreach($menu as $d)
            <tr>
                <td scope="row">{{ $d->id }}</td>
                <td>{{ $d->name }}</td>
                <td>
                @if($d->status == 0)
                    <form action="{{ url( MANAGE . '/event/verify/menu/' . $d->id) }}" method="post">
                        @csrf
                        <button class="btn btn-success">تفعيل</button>
                    </form>
                @else
                    <form action="{{ url( MANAGE . '/event/stop/menu/' . $d->id) }}" method="post">
                        @csrf    
                        <button class="btn btn-danger">إيقاف</button>
                    </form>
                @endif
                </td>
                <td>
                    <button class="btn btn-success answer_report" data-id='{{ $d->id }}'>تعديل</button>
                    <form action="{{ url( MANAGE . '/event/remove/menu/' . $d->id) }}" method="post">
                        @csrf    
                        <button class="btn btn-danger">حذف</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
            {!! $menu->links() !!}
    </div>
</div>
@stop