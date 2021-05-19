@include('layouts.header')
@include('layouts.topnav')
<!--Main Content-->


<div class="ms-panel">
    <div class="ms-panel-header">
      <h6>Orders List</h6>
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
                <th scope="col">Orders Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
                <td><img  src='{{asset('images')}}/food.png' style='width:50px; height:30px;'> {{$item["orders_name"]}}</td>
                <td>{{$item["orders_quantity"]}}</td>
                <td>{{$item["orders_price"]}}</td>
                <td>{{$item["orders_username"]}}</td>
                <td>{{$item["orders_food_id"]}}</td>
                <td>{{$item["orders_id"]}}</td>
                <td>{{$item["orders_location"]}}</td>
                @if($item->orders_status =='1')
                <td><span class="badge badge-success">Completed</span></td>
                <td><button onclick="document.location='{{"/admin/orderremove/".$item["id"]}}'" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Remove</button></td>
                @else
                <td><span class="badge badge-primary">Pending</span></td>
                <td><button onclick="document.location='{{"/admin/ordercompleted/".$item["id"]}}'" class="btn btn-success btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Completed</button></td>
                @endif

            </tr>
          @endforeach
        </tbody>
        </table>
      </div>
    </div>

  </div>






<!--/Main Content-->
@include('layouts.footer')