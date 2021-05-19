
@include('layouts.header')
@include('layouts.topnav')


<!--Main Content-->
    <div class="ms-content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1 class="db-header-title">Welcome, Admin</h1>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> 3.2%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Sells Graph</strong></span>
                <h2>$8,451</h2>
              </div>
            </div>
            <canvas id="line-chart"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_downward</i> 4.5%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Visitors</strong></span>
                <h2>3,973</h2>
              </div>
            </div>
            <canvas id="line-chart-2"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> 12.5%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>New Users</strong></span>
                <h2>7,333</h2>
              </div>
            </div>
            <canvas id="line-chart-3"></canvas>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
            <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> 9.5%</span>
            <div class="ms-card-body media">
              <div class="media-body">
                <span class="black-text"><strong>Total Orders</strong></span>
                <h2>48,973</h2>
              </div>
            </div>
            <canvas id="line-chart-4"></canvas>
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
                <table class="table table-hover thead-primary">
                  <thead>
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Order Name</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Location</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Delivered Time</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>French Fries</td>
                      <td>Jhon Leo</td>
                      <td>New Town</td>
                      <td><span class="badge badge-primary">Pending</span>
                      </td>
                      <td>10:05</td>
                      <td>$10</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Mango Pie</td>
                      <td>Kristien</td>
                      <td>Old Town</td>
                      <td><span class="badge badge-dark">Cancelled</span>
                      </td>
                      <td>14:05</td>
                      <td>$9</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>FrieD Egg Sandwich</td>
                      <td>Jack Suit</td>
                      <td>Oxford Street</td>
                      <td><span class="badge badge-success">Delivered</span>
                      </td>
                      <td>12:05</td>
                      <td>$19</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Lemon Yogurt Parfait</td>
                      <td>Alesdro Guitto</td>
                      <td>Church hill</td>
                      <td><span class="badge badge-success">Delivered</span>
                      </td>
                      <td>12:05</td>
                      <td>$18</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Spicy Grill Sandwich</td>
                      <td>Jacob Sahwny</td>
                      <td>palace Road</td>
                      <td><span class="badge badge-success">Delivered</span>
                      </td>
                      <td>12:05</td>
                      <td>$21</td>
                    </tr>
                    <tr>
                      <th scope="row">6</th>
                      <td>Chicken Sandwich</td>
                      <td>Peter Gill</td>
                      <td>Street 21</td>
                      <td><span class="badge badge-primary">Pending</span>
                      </td>
                      <td>12:05</td>
                      <td>$15</td>
                    </tr>
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
 