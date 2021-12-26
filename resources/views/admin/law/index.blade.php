@extends('admin.admin')

@section('title')
    القوانين المصرية
@stop

@section('options')
    <button class='btn btn-success'><a href="{{ url( MANAGE . '/law/add')}}"> إضافة قانون جديد</a></button>
@stop


@section('content')
<small id='active_button_bage' data-value='6'></small>
<div class="d-flex justify-content-center">
{!! $laws->links() !!}
</div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Law</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laws as $law)
                <tr>
                    <td scope="row">{{ $law->id }}</td>
                    <td>{{ $law->law_name }}</td>
                    <td>
                    <button class="btn btn-success"><a href="{{url( MANAGE . '/law/edit/' . $law->id )}}">تعديل</a></button>
                    <form action="{{ url( MANAGE . '/event/remove/law/' . $law->id) }}" method="post">
                        @csrf    
                        <button class="btn btn-danger">حذف</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $laws->links() !!}
        </div>
@stop
@section('scripts')
    <script src="{{asset('js/contract.js')}}"></script>
@stop