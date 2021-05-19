@include('layouts.header')
@include('layouts.topnav')
<!--Main Content-->

 <!-- Body Content Wrapper -->
 <div class="ms-content-wrapper">
    <div class="row">

      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Food</li>
          </ol>
        </nav>
      </div>



      <div class="col-xl-12 col-md-12">
        <div class="ms-panel ms-panel-fh">
          <div class="ms-panel-header">
            <h6>Edit Food Item</h6>
          </div>
          <div class="ms-panel-body">
            <form class="needs-validation clearfix" novalidate action="/admin/editfood" method="post" enctype="multipart/form-data"> 

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
                @csrf
                <input type="hidden" value="{{$data['food_id']}}" name="food_id">
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationCustom18">Food Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="validationCustom18" placeholder="Product Name" name="food_name" value="{{$data['food_name']}}" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="validationCustom22">Select Catagory</label>
                  <div class="input-group">
                    <select name="food_cat" class="form-control" id="validationCustom22" required>
                      <option value="" disabled selected>Choose Category</option>

                      @if($data->food_cat =='Breakfast')
                      <option selected value="Breakfast">Breakfast</option>
                      @else
                      <option value="Breakfast">Breakfast</option>
                      @endif

                      @if($data->food_cat =='Lunch')
                      <option selected value="Lunch">Lunch</option>
                      @else
                      <option value="Lunch">Lunch</option>
                      @endif

                      @if($data->food_cat =='Dinner')
                      <option selected value="Dinner">Dinner</option>
                      @else
                      <option value="Dinner">Dinner</option>
                      @endif

                    </select>
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('food_cat'){{ $message }} @enderror</div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="validationCustom22">Select Food Catagory</label>
                  <div class="input-group">
                    <select name="food_item_cat" class="form-control" id="validationCustom22" required>
                      <option value="" disabled selected>Choose Category</option>
                      @if($data->food_item_cat =='Food')
                      <option selected value="Food">Food</option>
                      @else
                      <option value="Food">Food</option>
                      @endif

                      @if($data->food_item_cat =='Drinks')
                      <option selected value="Drinks">Drinks</option>
                      @else
                      <option value="Drinks">Drinks</option>
                      @endif

                      @if($data->food_item_cat =='Desert')
                      <option selected value="Desert">Desert</option>
                      @else
                      <option value="Desert">Desert</option>
                      @endif
                    </select>
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('food_item_cat'){{ $message }} @enderror</div>
                </div>
              
                <div class="col-md-6 mb-3">
                  <label for="validationCustom24">Quantity</label>
                  <div class="input-group">
                    <input type="text class="form-control" id="validationCustom24" name="food_quantity" value="{{$data['food_quantity']}}" placeholder="01" required>
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('food_quantity'){{ $message }} @enderror</div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom25">Price</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="validationCustom25" name="food_price" value="{{$data['food_price']}}" placeholder="₹10" required>
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('food_price'){{ $message }} @enderror</div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="validationCustom12">Description</label>
                  <div class="input-group">
                    <textarea rows="5" id="validationCustom12" class="form-control" name="food_des" placeholder="Description" required>{{$data['food_des']}}</textarea>
                  </div>
                  <div class="text-danger" style="margin-bottom: 10px">@error('food_des'){{ $message }} @enderror</div>
                </div>

                <div class="col-md-1.5 mb-3"">
                <div class="ms-panel">
                <div class="ms-panel-header">
                  <p class="medium">Status Available</p>
                  <br>
                  
                  <div>
                    <label class="ms-switch">
                      @if ($data->shown =='1')
                      <input type="checkbox" checked name="shown">
                      @else
                      <input type="checkbox" name="shown">
                      @endif
                      <span class="ms-switch-slider round"></span>
                    </label>
                    <div class="text-danger" style="margin-bottom: 10px">@error('shown'){{ $message }} @enderror</div>

                  </div>
                </div>
              </div>
            </div>

                <div class="col-md-12 mb-3">
                  <label for="validationCustom12">Food Image</label>
                  <input type="file" value="{{$data["food_img"]}}" name="food_img" onchange="loadFile(event)" class="form-control" id="customFile" style="padding-bottom: 50px"/>
                  <br>
                  <br>
                  <img id="output" src="{{asset('images')}}/{{$data["food_img"]}}" style="width: 30%;" class="img-fluid rounded float-left">
                  <div class="text-danger" style="margin-bottom: 10px">@error('food_img'){{ $message }} @enderror</div>
                </div>
                <button class="btn btn-secondary d-block" type="submit">Save</button> 
              </div>

            </form>

          </div>
        </div>

      </div>
    

    </div>
</div>
</main>


<!--/Main Content-->
@include('layouts.footer')