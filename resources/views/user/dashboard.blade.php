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
        <img src="../assets/img/costic/banner-1000x370.jpg" alt="card_img">
      </div>
      <img src="../assets/img/costic/customer-10.jpg" class="ms-img-large ms-img-round ms-user-img" alt="people">
      <div class="ms-card-body">
        <h2>Anny Farisha</h2>
        <span>Quality Control Manager</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu turpis. Nunc</p>
        <button type="button" class="btn btn-gradient-primary" name="button"><i class="material-icons">person_add</i> Follow</button>
        <ul class="ms-profile-stats">
          <li>
            <h3 class="ms-count">5790</h3>
            <span>Followers</span>
          </li>
          <li>
            <h3 class="ms-count">4.8</h3>
            <span>User Rating</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>


<!--/Main Content-->

@include('layouts.userfooter')