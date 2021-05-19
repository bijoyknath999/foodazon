@include('layouts.userheader')
@include('layouts.usertopnav')

<!--Main Content-->

<div class="ms-content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb" class="new">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Food Court</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lunch</li>
          </ol>
        </nav>

        <div class="ms-panel ms-panel-fh">

            <div class="ms-panel-header">
          <h6>Food</h6>
        </div>
        <div class="ms-panel-body">
    
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
      <div class="row">
        @foreach ($food as $item)
        @if ($item->food_item_cat =='Food')
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="ms-card">
              <div class="ms-card-img">
                <img style="width: 100%; height: 270px;" src="{{asset('images')}}/{{$item["food_img"]}}" alt="card_img">
              </div>
              <div class="ms-card-body">
    
                <div class="new">
                  <h6 class="mb-0">{{$item["food_name"]}} </h6>
                  <h6 class="ms-text-primary mb-0">₹{{$item["food_price"]}}</h6>
                </div>
                <div class="new meta">
                  <p>Qty:{{$item["food_quantity"]}} </p>
                  @if($item->shown =='1')
                  <span class="badge badge-success">In Stock</span>
                  @else
                  <span class="badge badge-primary">Out of Stock</span>
                  @endif
                </div>
                <p>{{$item["food_des"]}}</p>
                <form method='POST' action="/user/addtocart">
                  @csrf
                <div class="new mb-0">
                  <input type="hidden" value="{{$item['food_name']}}" name="cart_name">
                  <input type="hidden" value="{{$item['food_price']}}" name="cart_price">
                  <input type="hidden" value="{{$item['food_id']}}" name="cart_food_id">
                  <div class="col-md-6 mb-0">
                    <label for="validationCustom22"></label>
                    <div class="input-group">
                      <select name="cart_quantity" class="form-control" id="validationCustom22" required>
                        <option value="" disabled selected>Select Quantity</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </div>
                    <div class="text-danger" style="margin-bottom: 10px">@error('cart_quantity'){{ $message }} @enderror</div>
                  </div>
                  <button type="submit" class="btn grid-btn mt-0 btn-sm btn-primary">Add To Cart</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        @endif
        @endforeach
        </div>
    </div>



        <div class="ms-panel-header">
          <h6>Drinks</h6>
        </div>
        <div class="ms-panel-body">
    
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
      <div class="row">
        @foreach ($food as $item)
        @if ($item->food_item_cat =='Drinks')
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="ms-card">
              <div class="ms-card-img">
                <img style="width: 100%; height: 270px;" src="{{asset('images')}}/{{$item["food_img"]}}" alt="card_img">
              </div>
              <div class="ms-card-body">
    
                <div class="new">
                  <h6 class="mb-0">{{$item["food_name"]}} </h6>
                  <h6 class="ms-text-primary mb-0">₹{{$item["food_price"]}}</h6>
                </div>
                <div class="new meta">
                  <p>Qty:{{$item["food_quantity"]}} </p>
                  @if($item->shown =='1')
                  <span class="badge badge-success">In Stock</span>
                  @else
                  <span class="badge badge-primary">Out of Stock</span>
                  @endif
                </div>
                <p>{{$item["food_des"]}}</p>
                <form method='POST' action="/user/addtocart">
                  @csrf
                <div class="new mb-0">
                  <input type="hidden" value="{{$item['food_name']}}" name="cart_name">
                  <input type="hidden" value="{{$item['food_price']}}" name="cart_price">
                  <input type="hidden" value="{{$item['food_id']}}" name="cart_food_id">
                  <div class="col-md-6 mb-0">
                    <label for="validationCustom22"></label>
                    <div class="input-group">
                      <select name="cart_quantity" class="form-control" id="validationCustom22" required>
                        <option value="" disabled selected>Select Quantity</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                    </div>
                    <div class="text-danger" style="margin-bottom: 10px">@error('cart_quantity'){{ $message }} @enderror</div>
                  </div>
                  <button type="submit" class="btn grid-btn mt-0 btn-sm btn-primary">Add To Cart</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        @endif
        @endforeach
        </div>
    </div>
    





    <div class="ms-panel-header">
      <h6>Desert</h6>
    </div>
    <div class="ms-panel-body">

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
  <div class="row">
    @foreach ($food as $item)
    @if ($item->food_item_cat =='Desert')
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
        <div class="ms-card">
          <div class="ms-card-img">
            <img style="width: 100%; height: 270px;" src="{{asset('images')}}/{{$item["food_img"]}}" alt="card_img">
          </div>
          <div class="ms-card-body">

            <div class="new">
              <h6 class="mb-0">{{$item["food_name"]}} </h6>
              <h6 class="ms-text-primary mb-0">₹{{$item["food_price"]}}</h6>
            </div>
            <div class="new meta">
              <p>Qty:{{$item["food_quantity"]}} </p>
              @if($item->shown =='1')
              <span class="badge badge-success">In Stock</span>
              @else
              <span class="badge badge-primary">Out of Stock</span>
              @endif
            </div>
            <p>{{$item["food_des"]}}</p>
            <form method='POST' action="/user/addtocart">
              @csrf
            <div class="new mb-0">
              <input type="hidden" value="{{$item['food_name']}}" name="cart_name">
              <input type="hidden" value="{{$item['food_price']}}" name="cart_price">
              <input type="hidden" value="{{$item['food_id']}}" name="cart_food_id">
              <div class="col-md-6 mb-0">
                <label for="validationCustom22"></label>
                <div class="input-group">
                  <select name="cart_quantity" class="form-control" id="validationCustom22" required>
                    <option value="" disabled selected>Select Quantity</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
                <div class="text-danger" style="margin-bottom: 10px">@error('cart_quantity'){{ $message }} @enderror</div>
              </div>
              <button type="submit" class="btn grid-btn mt-0 btn-sm btn-primary">Add To Cart</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    @endif
    @endforeach
    </div>
</div>




    </div>



    

</div>
</div>
</div>


<!--/Main Content-->

@include('layouts.userfooter')