@extends('admin.admin')

@section('title')
  Posts
@stop

@section('options')
    <button class='btn btn-success'><a href="{{ url(MANAGE . '/posts/add')}}"> إضافة منشور جديد</a></button>
@stop

@section('content')
<small id='active_button_bage' data-value='5'></small>
<div class="d-flex justify-content-center">
    {!! $posts->links() !!}
</div>
<div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">img</th>
                <th scope="col">img2</th>
                <th scope="col">created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{!! html_entity_decode($post->content) !!}</td>
                    <td><img src="{{url('images/posts/' . $post->img)}}" /></td>
                    <td><img src="{{url('images/posts/' . $post->img2)}}" /></td>
                    <td>{{ $post->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $posts->links() !!}
        </div>
@stop