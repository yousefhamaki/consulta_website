@extends('admin.contract.contract')

@section('title')
    العقود
@stop

@section('content')
    <small id='active_button_bage' data-value='7'></small>
<div class="d-flex justify-content-center">
    {!! $contracts->links() !!}
</div>
<div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Contract</th>
                <th scope="col">Branch</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                <tr>
                    <td scope="row">{{ $contract->id }}</td>
                    <td>{{ $contract->value }}</td>
                    <td>{{ $contract->name }}</td>
                    <td>
                        <button class="btn btn-success"><a href="{{url( MANAGE . '/contracts/edit/' . $contract->id )}}">تعديل</a></button>
                        <button class="btn btn-danger"><a href="{{url( MANAGE . '/contracts/delete/' . $contract->id )}}">حذف</a></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $contracts->links() !!}
        </div>
@stop
