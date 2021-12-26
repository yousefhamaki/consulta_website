@extends("team.app")

@section("title")
Dashboard
@stop


@section("content")

        <div class="col-lg-8">
          <div class="row">

          <?php $options = json_decode(Auth::guard('team')->user()->options); ?>
          @foreach($options as $data)
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                      <h2 style="text-align: center; padding: 30px; font-weight: bold;">{{$data}}</h2>
                </div>
              </div>
            </div>
            @endforeach
         </div>
        </div>
@stop
