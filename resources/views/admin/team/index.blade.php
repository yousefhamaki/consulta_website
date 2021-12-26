@extends('admin.admin')

@section('title')
  Consulta team
@stop

@section('options')
<a href="{{ url(MANAGE . '/admin/add')}}"><button class='btn btn-success'> إضافة عضو جديد</button></a>
@stop

@section('content')
<small id='active_button_bage' data-value='9'></small>
<div class="d-flex justify-content-center">
    {!! $team->links() !!}
</div>
<div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Options</th>
                <th scope="col">Salary</th>
                <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach($team as $d)
                <tr>
                    <td scope="row">{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>

                    <td>
                      (
                        <?php $data = json_decode($d->options); ?>
                      @foreach($data as $da)
                        <?php
                          if($da !== $data[count($data) - 1]){
                            echo $da . ",";
                          }else{
                            echo $da;
                          }
                        ?>
                      @endforeach
                      )
                    </td>
                    <td>{{ $d->salary }} EGP.</td>
                    <td>
                    @if($d->status == 0)
                        <form action="{{ url( MANAGE . '/event/verify/team/' . $d->id) }}" method="post">
                            @csrf
                            <button class="btn btn-success">تفعيل</button>
                        </form>
                    @else
                        <form action="{{ url( MANAGE . '/event/stop/team/' . $d->id) }}" method="post">
                            @csrf    
                            <button class="btn btn-danger">إيقاف</button>
                        </form>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $team->links() !!}
        </div>
@stop