@extends('layout.index')
@section('content')
<div class="main-menu">
  <header class="header">
    <a href="index.html" class="logo"><i class="fa fa-mortar-board main-icon" ></i>Skillflect</a>
    <button type="button" class="button-close fa fa-times js__menu_close"></button>
    <div class="user teacheruser">
      @foreach($profile_alldata as $Teacher)
        {{-- <a href="/studentpage" class="avatar"><img src="http://localhost/skillflect_admin/{{$Teacher->avatar}}" class="left_user" alt=""><span id="std_id" class="status online" value={{$Student->id}}></span></a> --}}
        <h5 class="name"><a href="/">{{$Teacher->name}}</a></h5>
        <h5 class="position">{{$Teacher->username}}</h5>
        <h5 >{{$Teacher->id}}</h5>
      @endforeach
    </div>
    <div class="user">
        <a href="/studentpage" class="avatar"><img src="assets/images/ic_logo.png" class="left_user" alt=""></a>
    </div>
    <!-- /.user -->
  </header>
	<!-- /.header -->
@include('component.teacher-menu');
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">My Class</h1>
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
				<div class="box-content page-box" id="class_list">
					<div class="row">
            <div class="box-content">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 850px">Class Name</th>
                    <th style="width: 160px">Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($class_list as $Class)
                  <tr class="class-tr">
                    <td class="class-tb">{{$Class->name}}</td>
                    <td><a href = "/get_student?id={{$Class->id}}"  class="btn btn-primary waves-effect waves-light" type="button" data-id="{{$Class->id}}" >View </a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
					</div>
        </div>

        
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

