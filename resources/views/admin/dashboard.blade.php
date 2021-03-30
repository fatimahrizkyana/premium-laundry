@extends('admin.master')

@section('content')
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
          
  <div class="row">
    <div class="col-lg-4 col-md-12 col-12 col-sm-12 p-0">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Order Statistics
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">24</div>
                <div class="card-stats-item-label">Pending</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">12</div>
                <div class="card-stats-item-label">Shipping</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">23</div>
                <div class="card-stats-item-label">Completed</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-danger bg-danger">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Orders</h4>
            </div>
            <div class="card-body">
              59
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">Store Profile
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">1</div>
                <div class="card-stats-item-label">Admin</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">2</div>
                <div class="card-stats-item-label">Cashier</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">10</div>
                <div class="card-stats-item-label">Worker</div>
              </div>
            </div>
          </div>
          <div class="card-icon shadow-danger bg-danger">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Employees</h4>
            </div>
            <div class="card-body">
              13
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Statistics</h4>
          <div class="card-header-action">
            <div class="btn-group">
              <a href="#" class="btn btn-primary">Week</a>
              <a href="#" class="btn">Month</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <canvas id="myChart" height="182"></canvas>
          <div class="statistic-details mt-sm-4">
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
              <div class="detail-value">$243</div>
              <div class="detail-name">Today's Sales</div>
            </div>
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
              <div class="detail-value">$2,902</div>
              <div class="detail-name">This Week's Sales</div>
            </div>
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
              <div class="detail-value">$12,821</div>
              <div class="detail-name">This Month's Sales</div>
            </div>
            <div class="statistic-details-item">
              <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
              <div class="detail-value">$92,142</div>
              <div class="detail-name">This Year's Sales</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
