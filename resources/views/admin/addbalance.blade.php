@include('layouts.header')
@include('layouts.topnav')
<!--Main Content-->


<!-- Email Widget -->
<div class="col-xl-6 col-md-12">
           @if(Session::get('success'))
              <div class="alert alert-success" role="alert">
                <strong>Well done! </strong>{{ Session::get('success') }}
              </div>
           @endif

           @if(Session::get('fail'))
           <div class="alert alert-danger" role="alert">
            <strong>Failed!</strong>{{ Session::get('fail') }}
          </div>
           @endif
    <div class="ms-panel ms-panel-fh ms-widget ms-email-widget">
      <div class="ms-panel-header">
        <div class="media clearfix">
          <div class="mr-3 align-self-center">
            <img src="{{asset('images')}}/user.png" class="ms-img-small ms-img-round" alt="people">
          </div>
          <div class="media-body">
            <h6>{{$data->first()->username}}</h6>
          </div>
          <ul class="ms-email-options">
            <li>Current Balance : ₹{{$data->first()->balance}}</li>
          </ul>
        </div>

      </div>
      <div class="ms-panel-body">
        <form method="post" class="clearfix" action="/admin/addbalance">
          @csrf
            <div class="form-group mb-4">
              <input type="hidden" value="{{$data->first()->username}}" name="username">
              <input type="hidden" value="{{$data->first()->id}}" name="id">
              <input type="number" name="balance" class="form-control" placeholder="Balance">
            </div>
          <button class="btn btn-primary float-right" type="submit">Add Balance</button>
        </form>
      </div>
    </div>
  </div>


<!--/Main Content-->
@include('layouts.footer')