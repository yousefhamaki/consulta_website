@extends('admin.menu.index')


@section('content')
<small id='active_button_bage' data-value='1'></small>
<div class="d-flex justify-content-center">
            {!! $fork->links() !!}
    </div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">fork</th>
                <th scope="col">menu</th>
                <th scope="col">status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                @foreach($fork as $fo)
            <tr>
                <td scope="row">{{ $fo->id }}</td>
                <td>{{ $fo->name }}</td>
                <td>{{ $fo->menu->name }}</td>
                <td>
                @if($fo->status == 0)
                    <form action="{{ url( MANAGE . '/event/verify/menu_forks/' . $fo->id) }}" method="post">
                        @csrf
                        <button class="btn btn-success">تفعيل</button>
                    </form>
                @else
                    <form action="{{ url( MANAGE . '/event/stop/menu_forks/' . $fo->id) }}" method="post">
                        @csrf    
                        <button class="btn btn-danger">إيقاف</button>
                    </form>
                @endif
                </td>
                <td>
                    <button class="btn btn-success answer_report" data-id='{{ $fo->id }}'>تعديل</button>
                    <form action="{{ url( MANAGE . '/event/remove/menu_forks/' . $fo->id) }}" method="post">
                        @csrf    
                        <button class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
            {!! $fork->links() !!}
    </div>
</div>
@stop