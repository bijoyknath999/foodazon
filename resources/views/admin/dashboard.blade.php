
@include('layouts.header')
@include('layouts.topnav')


<!--Main Content-->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1 class="db-header-title">Welcome, Admin</h1>
        </div>
        

         <!-- Icon cards Widget -->

         <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total New Customers</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$count['totalnewusers']}}</p>
              </div>
            </div>
            <i class="flaticon-user"></i>
          </div>
        </div>

      
        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total New Orders</h6>
                <p class="ms-card-change"> {{$count['totalneworders']}}</p>
              </div>
            </div>
            <i class="flaticon-statistics"></i>
          </div>
        </div>


        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Customers</h6>
                <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> {{$count['totalusers']}}</p>
              </div>
            </div>
            <i class="flaticon-user"></i>
          </div>
        </div>


        <div class="col-xl-3 col-md-6">
          <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Completed Orders</h6>
                <p class="ms-card-change"> {{$count['totalorders']}}</p>
              </div>
            </div>
            <i class="flaticon-statistics"></i>
          </div>
        </div>

        
      
        <!-- Recent Placed Orders< -->
        <div class="col-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Recently Placed Orders</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">

                <table class="table w-100 thead-primary">
                  <thead>
                    <tr>
                        <th scope="col">Orders Name</th>
                        <th scope="col">Orders Quantity</th>
                        <th scope="col">Orders Price</th>
                        <th scope="col">Customer Username</th>
                        <th scope="col">Orders Food ID</th>
                        <th scope="col">Orders ID</th>
                        <th scope="col">Orders Location</th>
                        <th scope="col">Orders Status</th>
                    </tr>
                </thead>
                <tbody>
                  <form class="form-inline mr-auto mb-4" method="GET" action="{{route('admin.recentorders')}}" ">
                  @foreach ($data as $item)
                    <tr>
                        <td><img  src='{{asset('images')}}/food.png' style='width:50px; height:30px;'> {{$item["orders_name"]}}</td>
                        <td>{{$item["orders_quantity"]}}</td>
                        <td>{{$item["orders_price"]}}</td>
                        <td>{{$item["orders_username"]}}</td>
                        <td>{{$item["orders_food_id"]}}</td>
                        <td>{{$item["orders_id"]}}</td>
                        <td>{{$item["orders_location"]}}</td>
                        @if($item->orders_status =='0')
                        <td><span class="badge badge-primary">Pending</span></td>
                        @endif
                    </tr>
                  @endforeach
                </form>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
<!--/Main Content-->


@include('layouts.footer')
 