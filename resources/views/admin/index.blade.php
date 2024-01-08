@extends('layouts.admin')


@section('content')

<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title></title>

    
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
    <body class="animsition">
    
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
    
            </header>
            <!-- HEADER DESKTOP-->
           

    

    <!-- Main JS-->
    <script src="js/main.js"></script>

 
        
<div class="main-content">
              
              <div class="section__content section__content--p30">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="overview-wrap">
                              <h2 class="title-1">overview</h2>
                           
                          </div>
                      </div>
                  </div>
                  <div class="row m-t-25">
                      <div class="col-sm-6 col-lg-3">
                          <div class="overview-item overview-item--c1">
                              <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                      <div class="icon">
                                          <i class="zmdi zmdi-account-o"></i>
                                      </div>
                                      <div class="text">
                                          <h2>{{ $book_count}}</h2>
                                          <span>number of books</span>
                                      </div>
                                  </div>
                                  <div class="overview-chart">
                                      <canvas id="widgetChart1"></canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                          <div class="overview-item overview-item--c2">
                              <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                      <div class="icon">
                                          <i class="zmdi zmdi-shopping-cart"></i>
                                      </div>
                                      <div class="text">
                                          <h2>{{$student_count}}</h2>
                                          <span>number of students</span>
                                      </div>
                                  </div>
                                  <div class="overview-chart">
                                      <canvas id="widgetChart2"></canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                          <div class="overview-item overview-item--c3">
                              <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                      <div class="icon">
                                          <i class="zmdi zmdi-calendar-note"></i>
                                      </div>
                                      <div class="text">
                                          <h2>{{$user_count}}</h2>
                                          <span>number of admins</span>
                                      </div>
                                  </div>
                                  <div class="overview-chart">
                                      <canvas id="widgetChart3"></canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                          <div class="overview-item overview-item--c4">
                              <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                      <div class="icon">
                                          <i class="zmdi zmdi-money"></i>
                                      </div>
                                      <div class="text">
                                          <h2>{{$authorName}}</h2>
                                          <span>most author</span>
                                          <span>number of books:{{$totalBooks}}</span>
                                         
                                      </div>
                                  </div>
                                  <div class="overview-chart">
                                      <canvas id="widgetChart4"></canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              
                    
            
                  
                 
              </div>
          </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
  </div>

</div>

    </body>
</html>












@endsection