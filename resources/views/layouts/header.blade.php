<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Gallery Frames</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Gallery Frames</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        @if(Auth::user()->role == 'Client')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{ url('order-product') }}">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Order Product</span>
        </a>
        </li>
        @endif

        @if(Auth::user()->role == 'Cashier')
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{ url('use-pos') }}">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Use POS</span>
        </a>
        </li>
        @endif

        @if(Auth::user()->role == 'Admin')

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
        </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#1" data-parent="#exampleAccordion">
        <i class="fa fa-fw fa-money"></i>
        <span class="nav-link-text">Sales</span>
    </a>
    <ul class="sidenav-second-level collapse" id="1">
       <li>
        <a href="{{ url('use-pos') }}">Use POS</a>
    </li>
    <li>
        <a href="{{ url('manage-customer-orders') }}">Manage Customer Orders</a>
    </li>
</ul>
</li>

<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#2" data-parent="#exampleAccordion">
    <i class="fa fa-fw fa-cubes"></i>
    <span class="nav-link-text">Manage Items</span>
</a>
<ul class="sidenav-second-level collapse" id="2">
   <li>
    <a href="{{ url('purchase-orders') }}">Purchase Orders</a>
</li>
<li>
    <a href="{{ url('goods-receipts') }}">Goods Receipts</a>
</li>
<li>
    <a href="{{ url('process-materials') }}">Process Materials</a>
</li>
                                    <!-- <li>
                                        <a href="{{ url('product-blueprints') }}">Product Blueprints</a>
                                    </li> -->
                                    <li><a href="{{ url('manage-inventory') }}">Inventory</a></li>
                                </ul>
                            </li>

                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#3" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-users"></i>
                                <span class="nav-link-text">Manage Users</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="3">
                               <li>
                                <a href="{{ url('manage-employees') }}">Employees</a>
                            </li>
                            <li>
                                <a href="{{ url('manage-suppliers') }}">Suppliers</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#4" data-parent="#exampleAccordion">
                                <i class="fa fa-fw fa-cog"></i>
                                <span class="nav-link-text">Manage Settings</span>
                            </a>
                            <ul class="sidenav-second-level collapse" id="4">
                               <li>
                                        <a href="{{ url('receipt-adjustment') }}">Receipt Adjustment</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('manage-branches') }}">Branches</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('manage-categories') }}">Categories</a>
                                    </li>

                                    <li><a href="{{ url('manage-items') }}">Items</a></li>
                        </ul>
                    </li>

                    @endif
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                      <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                  <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                      <input class="form-control" type="text" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
          </form>
      </li>
      <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

        </li>
    </ul>
</div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">