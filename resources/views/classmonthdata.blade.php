@extends('layout.index')
<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
@section('content')
<div class="main-menu">
  <header class="header">
    <a href="index.html" class="logo"><i class="fa fa-mortar-board main-icon" ></i>Skillflect</a>
    <button type="button" class="button-close fa fa-times js__menu_close"></button>
    <div class="user">
      @foreach($Class_user as $ClassUser)
        <a href="/studentpage" class="avatar"><img src="http://saudiclean.com.sa/test/skillflect_admin/{{$ClassUser->avatar}}" class="left_user" alt=""><span id="std_id" class="status online" value={{$ClassUser->id}}></span></a>
        <h5 class="name"><a href="#" id="profile_username" data-id="{{$ClassUser->id}}">{{$ClassUser->name}}</a></h5>
        <h5 class="position">{{$ClassUser->username}}</h5>
        <h5 >{{$ClassUser->grade}}</h5>
      @endforeach
    </div>
    <!-- /.user -->
  </header>
	<!-- /.header -->
  <div class="content">
    <div class="navigation">
      <!-- /.title -->
      <ul class="menu js__accordion">
        <li>
          <a class="waves-effect parent-item js__control" href=""><i class="menu-icon mdi mdi-border-all srcmenu-icon"></i><span>My Class</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="/classlist">My Class</a></li>
          </ul>
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="/#"><i class="menu-icon mdi mdi-format-horizontal-align-right srcmenu-icon"></i><span>Logout</span><span class="menu-arrow "></span></a>
          <ul class="sub-menu js__content">
            <li><a href="/">Log out</a></li>
          </ul>
        </li>
        </li>
      </ul>
    </div>
    <!-- /.navigation -->
  </div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Student Overall Data</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
    <a href="/" class="logout-color">Log Out</a>
    <a href="/" class="ico-item mdi mdi-logout"></a>
	</div>
	<!-- /.pull-right -->
</div>

<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		<div class="row col-md-12 small-spacing overall-box">
      <div class="col-md-3 col-xl-12">
        <div class="overall-user">
          @foreach($Class_user as $ClassUser)
          <a  class="avatar"><img src="http://saudiclean.com.sa/test/skillflect_admin/{{$ClassUser->avatar}}" class="data-userimg" alt=""><span class="status online"></span></a>
          <h5 class="name overall-name">{{$ClassUser->name}}</h5>
          <h5 class="position over-grade"><i class="menu-icon mdi mdi-school overall-icon"></i>Grade: <span>{{$ClassUser->grade}}</span></h5>
          @endforeach
        </div>
      </div>
      <!-- /.col-md-6 col-xs-12 -->
      <div class="col-md-9 col-xs-12">
        <p class="waves-effect parent-item js__control select-subject-title" ><i class="menu-icon mdi mdi-book-open-page-variant subject-titleicon"></i><span>Subject</span></p>
        <div class="form-group margin-bottom-20 select-subject overall-subject">
          <select class="form-control" id="class_monthid">
              <option value="0">All</option>
              @foreach($tch_sbj as $Subject)
              <option  value="{{$Subject->name}}" data-id={{$Subject->id}}>{{$Subject->name}}</option>
              @endforeach
          </select>
        </div>
        <div class="box-content">
          <div class="data-submenu sub-menu">
            <div>
            <a href = "javascript:void(0)" class="box-title" id="return_view"><i class="menu-icon mdi mdi-undo-variant"></i>Return</a>
            </div>
            <div>
            @foreach($Class_user as $ClassUser)
            <a href="/viewstudent?id={{$ClassUser->id}}" class="thisweek-btn">Over all</a>
            <a href="/classweek?id={{$ClassUser->id}}" class="thisweek-btn">This Week</a>
            @endforeach
            </div>
          </div>
          <!-- /.dropdown js__dropdown -->
          <form id="commentForm" action="#">
            <div id="tabsleft" class="tabbable tabs-left">
              <ul>
                <li><a href="#tabsleft-tab1" data-toggle="tab">Overall</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane" id="tabsleft-tab1">
                  <div class="box-content">
                    <div id="donut-morris-chart-classmonth" class="morris-chart" style="height: 320px"></div>
                    <div class="text-center">
                      <ul class="list-inline morris-chart-detail-list" id="select_chart">
                        {{-- <li><i class="fa fa-circle"></i>Series A</li>
                        <li><i class="fa fa-circle"></i>Series B</li>
                        <li><i class="fa fa-circle"></i>Series C</li> --}}
                      </ul>
                    </div>
                    <!-- /#donut-morris-chart.morris-chart -->
                  </div>
                </div>
              </div>
               {{-- Notification --}}
              <div class="row col-lg-12 sbj_notification">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="alert alert-info" id="month_notification" role="alert"> <strong>Heads up!</strong> There is no data to display. You can choose a different topic again. </div>
                </div>
                <div class="col-lg-3"></div>
              </div>
              {{-- Notification --}}
            </div>
          </form>
        </div>
        <!-- /.box-content -->
      </div>
      <!-- /.col-md-6 col-xs-12 -->
		</div>
  </div>
</div>
  <!-- /.main-content -->
<footer class="footer footer-menu">
  <ul class="list-inline">
    <li>2020 © Skillflect</li>
    <li><a href="#">Skill Add</a></li>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Data</a></li>
  </ul>
</footer>
@endsection
