@include('layouts.userheader')
@include('layouts.usertopnav')

<!--Main Content-->


<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
    <div class="row">
<!-- User Profile Widget -->
<div class="col-xl-4 col-md-12">
    <div class="ms-card ms-widget ms-profile-widget ms-card-fh">
      <div class="ms-card-img">
        <img src="{{asset('images')}}/banner-1000x370.jpg" alt="card_img">
      </div>
      <img src="{{asset('images')}}/user.png" class="ms-img-large ms-img-round ms-user-img" alt="people">
      <div class="ms-card-body">
      <h2>{{$data->firstname}} {{$data->lastname}}</h2>
        <span>{{$data->username}}</span>
        <p>{{$data->email}}</p>
        <ul class="ms-profile-stats">
          <li>
            <h3 class="ms-count">₹{{$data->balance}}</h3>
            <span>Current Balance</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>


<!--/Main Content-->

@include('layouts.userfooter')