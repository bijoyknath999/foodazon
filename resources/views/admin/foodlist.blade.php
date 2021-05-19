@include('layouts.header')
@include('layouts.topnav')
<!--Main Content-->

<div class="ms-panel">
    <div class="ms-panel-header">
      <h6>Food List</h6>
    </div>
    <div class="ms-panel-body">
    
      <div class="table-responsive">

        <div class="col-md-6 mb-4">

          <form class="form-inline mr-auto mb-4" method="GET" action="{{route('admin.foodlist')}}" ">
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
                <th scope="col">Food ID</th>
                <th scope="col">Food Name</th>
                <th scope="col">Food Category</th>
                <th scope="col">Food Quantity</th>
                <th scope="col">Food Price</th>
                <th scope="col">Food Status</th>
                <th scope="col">Food Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($food as $item)
            <tr>
                <th scope="row">{{$item["food_id"]}}</th>
                <td><img  src='{{asset('images')}}/{{$item["food_img"]}}' style='width:50px; height:30px;'> {{$item["food_name"]}}</td>
                <td>{{$item["food_cat"]}}({{$item["food_item_cat"]}})</td>
                <td>{{$item["food_quantity"]}}</td>
                <td>₹{{$item["food_price"]}}</td>
                @if($item->shown =='1')
                <td><span class="badge badge-success">In Stock</span></td>
                @else
                <td><span class="badge badge-primary">Out Of Stock</span></td>
                @endif
                @csrf
                <td><button onclick="document.location='{{"/admin/editfood/".$item["food_id"]}}'" class="btn btn-success btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Edit</button>
                  <button onclick="document.location='{{"/admin/deletefood/".$item["food_id"]}}'" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Delete</button></td>

            </tr>
          @endforeach
        </tbody>
        </table>
      </div>
          <span>{{$food->withQueryString()->links('pagination')}}</span>

    </div>

  </div>


<!--/Main Content-->
@include('layouts.footer')