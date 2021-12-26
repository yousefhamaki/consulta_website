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
                @if(isset($fork[0]->menu_fork))
                <th scope="col">fork option</th>
                <th scope="col">fork</th>
                @elseif(isset($fork[0]->forkoption))
                <th scope="col">fork option option</th>
                <th scope="col">fork option</th>
                @endif
                <th scope="col">status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                @foreach($fork as $fo)
            <tr>
                <td scope="row">{{ $fo->id }}</td>
                @if(isset($fo->menu_fork))
                <td>{{ $fo->name }}</td>
                <td>{{ $fo->menu_fork->name }}</td>
                @elseif(isset($fo->forkoption))
                <td>{{ $fo->name }}</td>
                <td>{{ $fo->forkoption->name }}</td>
                @endif
                <td>
                @if(isset($fo->menu_fork))
                    @if($fo->status == 0)
                        <form action="{{ url( MANAGE . '/event/verify/forks_options/' . $fo->id) }}" method="post">
                            @csrf
                            <button class="btn btn-success">تفعيل</button>
                        </form>
                    @else
                        <form action="{{ url( MANAGE . '/event/stop/forks_options/' . $fo->id) }}" method="post">
                            @csrf    
                            <button class="btn btn-danger">إيقاف</button>
                        </form>
                    @endif
                @elseif(isset($fo->forkoption))
                    @if($fo->status == 0)
                        <form action="{{ url( MANAGE . '/event/verify/forks_option_option/' . $fo->id) }}" method="post">
                            @csrf
                            <button class="btn btn-success">تفعيل</button>
                        </form>
                    @else
                        <form action="{{ url( MANAGE . '/event/stop/forks_option_option/' . $fo->id) }}" method="post">
                            @csrf    
                            <button class="btn btn-danger">إيقاف</button>
                        </form>
                    @endif
                @endif
                
                </td>
                <td>
                    <button class="btn btn-success answer_report" data-id='{{ $fo->id }}'>تعديل</button>
                    @if(isset($fo->menu_fork))
                        <form action="{{ url( MANAGE . '/event/remove/forks_options/' . $fo->id) }}" method="post">
                            @csrf    
                            <button class="btn btn-danger">حذف</button>
                        </form>
                    @elseif(isset($fo->forkoption))
                    <form action="{{ url( MANAGE . '/event/remove/forks_option_option/' . $fo->id) }}" method="post">
                        @csrf    
                        <button class="btn btn-danger">حذف</button>
                    </form>
                    @endif
                    
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