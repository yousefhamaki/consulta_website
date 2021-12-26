@extends('admin.admin')

@section('title')
  الإبلاغات
@stop

@section('content')
<small id='active_button_bage' data-value='4'></small>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">message</th>
                <th scope="col">Type</th>
                <th scope="col">img</th>
                <th scope="col">link</th>
                <th scope="col">time</th>
                <th scope="col">options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td scope="row">{{ $report->id }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{!! html_entity_decode($report->report_message) !!}</td>
                    <td>{{ $report->type }}</td>
                    <td>
                        @if(!$report->img == NULL)<img src='{{ url("images/reports/" . $report->img) }}' />@endif
                    </td>
                    <td>
                        @if(!$report->link == NULL)<a href='{{ $report->link }}'>Link</a>@endif
                    </td>
                    <td>{{ $report->time }}</td>
                    <td><button class="btn btn-success answer_report" data-id='{{ $report->id }}'>Send answer</button></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
@stop
@section('scripts')
    <script>
        let answer_buttons = document.querySelectorAll('.answer_report');
        answer_buttons.forEach(button => {
            button.addEventListener('click', () =>{
                location.href = 'reports/answer/' + button.dataset.id;
            })
        });
    </script>
@stop