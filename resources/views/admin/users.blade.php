@extends('admin.admin')

@section('title')
    Users
@stop
@section('content')
<small id='active_button_bage' data-value='3'></small>
<div class="d-flex justify-content-center">
    {!! $users->links() !!}
</div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">User name</th>
                <th scope="col">Age</th>
                <th scope="col">Rank</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>username</td>
                    <td>{{ $user->age }}</td>
                    <td>user</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
@stop