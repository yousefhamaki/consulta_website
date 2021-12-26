@extends('admin.contract.contract')
@section('title')
    أقسام العقود
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
                <th scope="col">Logo</th>
                <th scope="col">Section</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contracts as $contract)
                <tr>
                    <td scope="row">{{ $contract->id }}</td>
                    <td><i class='{{ $contract->logo }}'></i></td>
                    <td>{{ $contract->section }}</td>
                    <td>
                        <button class="btn btn-success edit_law" data-id='{{ $contract->id }}'>تعديل</button>
                        <button class="btn btn-danger remove_law" data-id='{{ $contract->id }}'>حذف</button>
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