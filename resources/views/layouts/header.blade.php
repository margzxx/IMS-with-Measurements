<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gallery Frames PH</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('dashboard') }}">Gallery Frames PH</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>

                        @if(Auth::guest())

                          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                          <a class="nav-link" href="{{ url('/') }}">
                            <i class="fa fa-fw fa-home"></i>
                            <span class="nav-link-text">Home</span>
                        </a>
                    </li>

                     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                          <a class="nav-link" href="{{ url('products') }}">
                            <i class="fa fa-fw fa-cubes"></i>
                            <span class="nav-link-text">Products and Services</span>
                        </a>
                    </li>

                     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                          <a class="nav-link" href="{{ url('about-us') }}">
                            <i class="fa fa-fw fa-print"></i>
                            <span class="nav-link-text">About us</span>
                        </a>
                    </li>

                     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                          <a class="nav-link" href="{{ url('branch-locator') }}">
                            <i class="fa fa-fw fa-location-arrow"></i>
                            <span class="nav-link-text">Branch Locator</span>
                        </a>
                    </li>
                        @else

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
            @endif

            <li>
               <a href="#"><i class="fa fa-sitemap fa-fw"></i> Sales<span class="fa arrow"></span></a>
               <ul class="nav nav-second-level">
                  <li>
                      <a href="{{ url('use-pos') }}">Use POS</a>
                  </li>
                  <li>
                    <a href="{{ url('manage-customer-orders') }}">Manage Customer Orders</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>



        <li>
           <a href="#"><i class="fa fa-table fa-fw"></i> Manage Items<span class="fa arrow"></span></a>
           <ul class="nav nav-second-level">
              <li>
                  <a href="{{ url('purchase-orders') }}">Purchase Orders</a>
              </li>
              <li>
                  <a href="{{ url('goods-receipts') }}">Goods Receipts</a>
              </li>
              <li>
                  <a href="{{ url('process-materials') }}">Process Materials</a>
              </li>
          </ul>
          <!-- /.nav-second-level -->
      </li>

      <li>
       <a href="#"><i class="fa fa-user fa-fw"></i> Manage Users<span class="fa arrow"></span></a>
       <ul class="nav nav-second-level">
         <li>
            <a href="{{ url('manage-employees') }}">Employees</a>
        </li>
        <li>
            <a href="{{ url('manage-suppliers') }}">Suppliers</a>
        </li>
    </ul>
    <!-- /.nav-second-level -->
</li>

<li>
   <a href="#"><i class="fa fa-cog fa-fw"></i> Manage Settings<span class="fa arrow"></span></a>
   <ul class="nav nav-second-level">
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
<!-- /.nav-second-level -->
</li>

@endif
</ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper" style="padding-top:20px">
    <div class="row">