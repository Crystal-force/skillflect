@extends('layout.index')
@section('content')
<div class="main-menu">
  <header class="header">
    <a href="index.html" class="logo"><i class="fa fa-mortar-board main-icon" ></i>Skillflect</a>
    <button type="button" class="button-close fa fa-times js__menu_close"></button>
    <div class="user">
      @foreach($profile_alldata as $Student)
       
        <a href="/studentpage" class="avatar"><img src="http://saudiclean.com.sa/test/skillflect_admin/{{$Student->avatar}}" class="left_user" alt=""><span id="std_id" class="status online" value={{$Student->id}}></span></a>
        <h5 class="name"><a href="/">{{$Student->name}}</a></h5>
        <h5 class="position">{{$Student->username}}</h5>
        <h5 >{{$Student->grade}}</h5>
      @endforeach
    </div>
    <!-- /.user -->
  </header>
	<!-- /.header -->
@include('component.left-menu');
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Student Skills</h1>
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
		<div class="row row-inline-block small-spacing">
			<div class="col-xs-12">
				<div class="box-content page-box">
					<div class="row">
            <div class="col-md-6 col-xs-12 subject-box">
              <p class="waves-effect parent-item js__control select-subject-title" ><i class="menu-icon mdi mdi-book-open-page-variant subject-titleicon"></i><span>Subject</span></p>
              <div class="form-group margin-bottom-20 select-subject">
                <select class="form-control" id="subject_select">
                    <option value="default" selected disabled>Nothing selected</option>
                    @foreach(Session::get('data_sbj') as $Subject)
                    <option id="sub_id" value="{{$Subject->name}}" data-id={{$Subject->id}}>{{$Subject->name}}</option>
                    @endforeach
                </select>
              </div>
              <p class="waves-effect parent-item js__control select-subject-title" ><i class="menu-icon mdi mdi-format-list-bulleted subject-titleicon"></i><span>Skills</span></p>
              @foreach(Session::get('data_skill') as $key=>$Skills)
              <button type="button" class="btn btn-primary btn-bordered waves-effect waves-light  skill-select" onclick="Select_Skill(this);" data-toggle="modal" data-target="#boostrapModal-1" data-id="{{$Skills->id}}" value="{{$Skills->id}}"><div><span>{{$key+1}}.</span> {{$Skills->name}}</div><div><i class="menu-icon mdi mdi-chevron-down subject-titleicon"></i><div></button>
              @endforeach  
            </div>
            <div class="col-md-6 col-xs-12">
              <p class="waves-effect parent-item js__control select-subject-title preview-title" ><i class="menu-icon mdi mdi-file-outline subject-titleicon"></i><span>Preview</span></p>
              <table class="table preview-box">
                <thead>
                  <tr>
                    <th style="width: 100%"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span style="font-size:16px">Subject: &nbsp;&nbsp;&nbsp;&nbsp;</span><span id="selected_sbj" style="color:rgb(97, 97, 243)"></span></td>
                  </tr>
                  <tr>
                    <td class="preview-td"><span style="font-size:16px">Skills: &nbsp;&nbsp;&nbsp;&nbsp;</span><span id="checked_skills" style="color:rgb(97, 97, 243)"></span></td>
                  </tr>
                </tbody>
              </table>
              <p class="waves-effect parent-item js__control select-subject-title" ><i class="menu-icon mdi mdi-pen subject-titleicon"></i><span>How did you use this skill today?</span></p>
              <textarea class="form-control" id="inp-type-5" placeholder="Write your meassage"></textarea>
              <ul class="list-inline send-btn">
                <li class="margin-bottom-10"><button type="button" class="btn waves-effect waves-light cancel-btn">Cancel</button></li>
                <li class="margin-bottom-10"><button type="button" class="btn btn-primary waves-effect waves-light" onclick="Send_Data();">Submit</button></li>
              </ul>
            </div>
					</div>
					<!-- /.row -->
        </div>
        {{-- Notification --}}
        <div class="row col-lg-12 sbj_notification">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="alert alert-danger alert-dismissible" id="sbj_nitification" role="alert"> 
              <button type="button" class="close" id="notification_close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Warning!</strong> Please select correct items. 
            </div>
          </div>
          <div class="col-lg-3"></div>
        </div>
        {{-- Notification --}}
        {{-- Notification --}}
        <div class="row col-lg-12 sbj_notification">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="alert alert-success" id="success_noti" role="alert"> <strong>Well done!</strong> It has been stored all data correctly. </div>
          </div>
          <div class="col-lg-3"></div>
        </div>
        {{-- Notification --}}
			</div>
			<!-- /.col-xs-12 -->
		</div>
	
	</div>
  <!-- /.main-content -->
  
</div><!--/#wrapper -->
<footer class="footer footer-menu">
  <ul class="list-inline">
    <li>2020 © Skillflect</li>
    <li><a href="#">Skill Add</a></li>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Data</a></li>
  </ul>
</footer>
<div class="modal fade" id="boostrapModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"> Skills Option</h4>
			</div>
			<div class="modal-body">
        <div id="positionGroup" >
        
        </div>
      </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal" onclick="Cancel_skills();">Close</button>
				<button type="button" class="btn btn-primary btn-sm waves-effect waves-light"  data-dismiss="modal">Confirm</button>
			</div>
		</div>
	</div>
</div>





@endsection

