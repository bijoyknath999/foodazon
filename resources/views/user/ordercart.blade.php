@include('layouts.userheader')
@include('layouts.usertopnav')

<!--Main Content-->

<div class="ms-panel">
    <div class="ms-panel-header">
      <h6>Cart List</h6>
    </div>
    <div class="ms-panel-body">
   @if(Session::get('fail'))
   <div class="alert alert-danger" role="alert">
    <strong>Failed!</strong>{{ Session::get('fail') }}
  </div>
   @endif
      <div class="table-responsive">

        <table class="table w-100 thead-primary">
          <thead>
            <tr>
                <th scope="col">Cart ID</th>
                <th scope="col">Cart Name</th>
                <th scope="col">Cart Quantity</th>
                <th scope="col">Cart Price</th>
                <th scope="col">Cart Actions</th>
            </tr>
        </thead>
        <tbody>
          <?php $da = 0;?>
          @foreach ($cart as $item)
          @if ($item->orders_type==0)

            <tr>
              <th scope="row">{{$item["id"]}}</th>
              <td><img  src='{{asset('images')}}/food.png' style='width:50px; height:30px;'> {{$item["orders_name"]}}</td>
              <td>{{$item["orders_quantity"]}}</td>
              <td>₹{{$item["orders_price"]}}</td>
              <?php $da=$da+$item["orders_price"] ?>
              <input type="hidden" name="id" value="{{$item["id"]}}">
              <td><button onclick="document.location='{{"/user/cartdelete/".$item["id"]}}'" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Remove</button></td>
              </form>
          </tr>
          @endif
          @endforeach
        </tbody>
        </table>
        <form class="needs-validation clearfix" novalidate action="/user/submitorder" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="balance" value="{{$da}}">
        <div class="col-md-3 mb-0">
          <label for="validationCustom22"></label>
          <div class="input-group">
            <select name="orders_location" class="form-control" id="validationCustom22" required>
              <option value="" disabled selected>Select Delivery Location</option>
              <option value="Table 1">Table 1</option>
              <option value="Table 2">Table 2</option>
              <option value="Table 3">Table 3</option>
              <option value="Table 4">Table 4</option>
              <option value="Table 5">Table 5</option>
              <option value="Table 6">Table 6</option>
              <option value="Table 7">Table 7</option>
              <option value="Table 8">Table 8</option>
              <option value="Table 9">Table 9</option>
              <option value="Table 10">Table 10</option>
            </select>
          </div>
          <div class="text-danger" style="margin-bottom: 10px">@error('order_location'){{ $message }} @enderror</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Order Submit</button>
      </form> 
      </div>
    </div>

  </div>

<!--/Main Content-->

@include('layouts.userfooter')