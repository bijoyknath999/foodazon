<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from slidesigma.com/themes/html/costic/pages/prebuilt-pages/default-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Feb 2020 13:14:06 GMT -->
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Foodazon | Register</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/vendors/iconic-fonts/flat-icons/flaticon.css')}}">
    <link href="{{asset('/vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="{{asset('/assets/css/jquery-ui.min.css')}}" rel="stylesheet">
  <!-- Costic styles -->
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="{{asset('image/png')}}" sizes="32x32" href="{{asset('/favicon.ico')}}">

</head>

<body class="ms-body ms-primary-theme ms-logged-out">

  <!-- Main Content -->
  <main class="body-content">

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper ms-auth">

      <div class="ms-auth-container">
        <div class="ms-auth-col">
          <div class="ms-auth-bg"></div>
        </div>
        <div class="ms-auth-col">
          <div class="ms-auth-form">
            <form class="needs-validation" novalidate="" action="{{ route('user.save') }}" method="post">

                @if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif

                @csrf
              <h3>Create Account</h3>
              <p>Please enter personal information to continue</p>
              <div class="form-row">
                <div class="col-md-6 ">
                  <label for="validationCustom01">First name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="validationCustom01" name="firstname" placeholder="First name" value="{{ old('firstname') }}" required="">
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <label for="validationCustom02">Last name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="validationCustom02" name="lastname" placeholder="Last name" value="{{ old('lastname') }}" required="">
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 ">
                  <label for="validationCustom03">Username</label>
                  <div class="input-group">
                    <input type="username" class="form-control" id="validationCustom03" name="username" placeholder="Username" value="{{ old('username') }}" required="">
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('username'){{ $message }} @enderror</div>
                </div>

                <div class="col-md-12 ">
                  <label for="validationCustom05">Enrollment No</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="validationCustom05" name="enroll_no" placeholder="Enrollment No" value="{{ old('enroll_no') }}" required="">
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('enroll_no'){{ $message }} @enderror</div>
                </div>

                <div class="col-md-12 ">
                  <label for="validationCustom03">Email Address</label>
                  <div class="input-group">
                    <input type="email" class="form-control" id="validationCustom03" name="email" placeholder="Email Address" value="{{ old('email') }}" required="">
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('email'){{ $message }} @enderror</div>
                </div>

                <div class="col-md-12 ">
                  <label for="validationCustom04">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="validationCustom04" name="password" placeholder="Password" required="">
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('password'){{ $message }} @enderror</div>
                </div>
              </div>
              
              <button class="btn btn-primary mt-4 d-block w-100" type="submit">Create Account</button>
              
              <p class="mb-0 mt-3 text-center">Already have an account? <a class="btn-link" href="{{route('user.login')}}">Login</a> </p>
            </form>

          </div>
        </div>
      </div>

    </div>

  </main>

  <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="{{asset('/assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/assets/js/perfect-scrollbar.js')}}"> </script>
  <script src="{{asset('/assets/js/jquery-ui.min.js')}}"> </script>
  <!-- Global Required Scripts End -->

  <!-- Costic core JavaScript -->
  <script src="{{asset('/assets/js/framework.js')}}"></script>

  <!-- Settings -->
  <script src="{{asset('/assets/js/settings.js')}}"></script>

</body>


<!-- Mirrored from slidesigma.com/themes/html/costic/pages/prebuilt-pages/default-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Feb 2020 13:14:06 GMT -->
</html>
