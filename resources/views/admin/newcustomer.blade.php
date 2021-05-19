
@include('layouts.header')
@include('layouts.topnav')


<!--Main Content-->

<div class="ms-panel">
    <div class="ms-panel-header">
      <h6>New Customers List</h6>
    </div>
    <div class="ms-panel-body">
    
      <div class="table-responsive">

        <div class="col-md-6 mb-4">

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

          <form class="form-inline mr-auto mb-4" method="GET" action="{{route('admin.newcustomer')}}" ">
            <input class="form-control mr-sm-2" name="search" value="{{ request()->input('search') }}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
          </form>

          @if( request()->get('search') )
          
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" >Showing results for : {{ request()->input('search') }}</div></div>
          @endif
    
        </div>

        <table class="table w-100 thead-primary">
          <thead>
            <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Customer Username</th>
                <th scope="col">Customer Email</th>
                <th scope="col">Customer Approval</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($users as $item)
          @if($item->verified =='0')
            <tr>
                <th scope="row">{{$item["id"]}}</th>
                <td><img  src='{{asset('images')}}/user.png' style='width:50px; height:30px;'> {{$item["firstname"]}} {{$item["lastname"]}}</td>
                <td>{{$item["username"]}}</td>
                <td>{{$item["email"]}}</td>
                <form method='POST' action="/admin/verified">
                  @csrf
                <input type="hidden" name="id" value="{{$item["id"]}}">
                <td><button class="btn btn-success btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Verify</button></td>
                </form>
            </tr>
            @else
            {{-- <div class="alert alert-danger" role="alert">
              <strong>Empty List!</strong>
            </div> --}}
            @endif
          @endforeach
        </tbody>
        </table>
      </div>
          <span>{{$users->withQueryString()->links('pagination')}}</span>

    </div>

  </div>

<!--/Main Content-->


@include('layouts.footer')
