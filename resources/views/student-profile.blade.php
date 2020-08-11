
@extends('layout.index')

@section('content')
<div class="main-menu">
  <header class="header">
    <a href="index.html" class="logo"><i class="fa fa-mortar-board main-icon" ></i>Skillflect</a>
    <button type="button" class="button-close fa fa-times js__menu_close"></button>
    <div class="user">
      @foreach($profile_alldata as $Student)
        <a href="/studentpage" class="avatar"><img src="http://saudiclean.com.sa/test/skillflect_admin/{{$Student->avatar}}" class="left_user" alt=""><span id="std_id" class="status online" data-id={{$Student->id}}></span></a>
        <h5 class="name"><a href="#">{{$Student->name}}</a></h5>
        <h5 class="position">{{$Student->username}}</h5>
        <h5 >{{$Student->grade}}</h5>
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
          <a class="waves-effect parent-item js__control" href=""><i class="menu-icon mdi mdi-border-all srcmenu-icon"></i><span>Skill</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="/studentpage">Skill</a></li>
          </ul>
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account srcmenu-icon"></i><span>Profile</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="/profile">Edit</a></li>
          </ul>
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac srcmenu-icon" ></i><span>Data</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="/all_data">Overall</a></li>
            <li><a href="/thisweek">This Week</a></li>
            <li><a href="/thismonth">This Month</a></li>
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
		<h1 class="page-title">About Student</h1>
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
		<div class="row small-spacing">
			<div class="col-md-3 col-xs-12">
				<div class="box-content bordered primary margin-bottom-20">
					<div class="profile-avatar">
            @foreach($profile_alldata as $Student)
            <div class="card-body">
              <center class="m-t-30">
                <div class="upload-img-bar content-center">
                    <img id="avatar-img" class="img-circle profile_img" src="http://saudiclean.com.sa/test/skillflect_admin/{{$Student->avatar}}" width="150" alt="avatar" data-id="{{$Student->id}}">
                    <div class="upload-button-div hide">
                        <label class="browse-button" data-toggle="tooltip">Browse...
                            <input type="file" class="sr-only" id="input-avatar-change" name="image"
                                  accept="image/*" style="width: 220px">
                        </label>
                    </div>
                </div>
                <a href="#" class="btn btn-block btn-friend"><i class="fa fa-check-circle"></i> Student</a>
                <h4 class="user_profile">Name:&nbsp;&nbsp;&nbsp;<span> {{$Student->name}}</span></h4>
                <p class="user_profile">Username:&nbsp;&nbsp;&nbsp;<span> {{$Student->username}}</span></p>
                <p class="user_profile">Grade:&nbsp;&nbsp;&nbsp;<span> {{$Student->grade}}</span></p>
              </center>
            </div>
            @endforeach
					</div>
				</div>
				<!-- /.box-content bordered -->
			</div>
			<!-- /.col-md-3 col-xs-12 -->
			<div class="col-md-9 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
							<h4 class="box-title"><i class="fa fa-user ico"></i>Change Personal Information</h4>
							<!-- /.box-title -->
							<div class="dropdown js__drop_down">
								<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
								<ul class="sub-menu">
									<li><a href="#" data-toggle="modal" data-target="#ProfileText">Edit</a></li>
								</ul>
								<!-- /.sub-menu -->
							</div>
							<!-- /.dropdown js__dropdown -->
							<div class="card-content">
								<div class="row col-md-12">
								    @foreach($profile_alldata as $Student)
									<div class="col-md-6 profile-input">
										<div class="row">
											<div class="col-xs-3 change-name"><label class="profile-edit-title">Name:</label></div>
											<!-- /.col-xs-5 -->
                      <div class="col-xs-9 change-name-in"><input type="text" class="form-control" id="profilename" placeholder="{{$Student->name}}" value="{{$Student->name}}"></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6 profile-input">
										<div class="row">
											<div class="col-xs-2"><label class="profile-edit-title">Email:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-10"><input type="text" class="form-control" id="profileemail" placeholder="new email" placeholder="{{$Student->email}}" value="{{$Student->email}}"></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									@endforeach
									</div>
									<div class="row col-md-12">
									 @foreach($profile_alldata as $Student)
									<div class="col-md-6 profile-input">
										<div class="row">
											<div class="col-xs-2"><label class="profile-edit-title">Psssword:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-10 change-pass" ><input type="text" class="form-control" id="profilepass"  placeholder="{{$Student->password}}" value="{{$Student->password}}"></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									@endforeach
									<!-- /.col-md-6 -->
									<div class="col-md-6 profile-input">
										<div class="row">
											<div class="col-xs-2"><label class="profile-grade" style="padding-top:15px">Grade:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-10 ">
                        <select class="form-control" id="profilegrade">
                            <option value="">{{$Student->grade}}</option>
                            <option value="1">6</option>
                            <option value="2">7</option>
                            <option value="3">8</option>
                            <option value="3">9</option>
                            <option value="3">10</option>
                            <option value="3">11</option>
                            <option value="3">12</option>
                        </select>
                      </div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
                  </div>
                  <!-- /.col-md-6 -->
                  <div class="col-md-12 save-btn" style="padding-bottom:20px">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#ProfileSave">Save Information</button>
                  </div>
                  </div>
                      <div class="row col-lg-12 update_notification">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="alert alert-success  notifi-text" role="alert"> The data has been successfully updated.</div>
      </div>
      <div class="col-lg-3"></div>
    </div>
    <div class="row col-lg-12 update_false">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div class="alert alert-danger notifi-text" role="alert"> An error occurred in the operation. Enter all field values correctly.</div>
      </div>
      <div class="col-lg-3"></div>
    </div>
								</div>
								<!-- /.row -->
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
				</div>
			</div>
			<!-- /.col-md-9 col-xs-12 -->
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


<div class="modal fade" id="ProfileEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Select the avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="img-container content-center">
            <img id="crop-image" style="width: 400px; height: 360px" src="">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" id="crop-button">Set as Avatar</button>
    </div>
		</div>
	</div>
</div>

<div class="modal fade" id="ProfileSave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirm!</h4>
			</div>
			<div class="modal-body">
        <p>This is information that you just changed.</p>
				<p>Do you save the Information?</p>
			</div>
			<div class="modal-footer">
        @foreach(Session::get('data_std') as $Student)
				<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary btn-sm waves-effect waves-light savebtn" id="save_profile" data-dismiss="modal" data-id="{{$Student->id}}" >Save changes</button>
        @endforeach
			</div>
		</div>
	</div>
</div>


@endsection
<script src="assets/scripts/jquery.min.js"></script>
<script>
  let canvas_pic;
  function toDataURL(url, callback) {
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
          var reader = new FileReader();
          reader.onloadend = function() {
              callback(reader.result);
          }
          reader.readAsDataURL(xhr.response);
      };
      xhr.open('GET', url);
      xhr.responseType = 'blob';
      xhr.send();
  }

  toDataURL("", function(dataUrl) {
      // canvas_pic = dataUrl;
      // document.getElementById('avatar-img').src = canvas_pic;
  })
  window.addEventListener('DOMContentLoaded', function () {

      let avatar = document.getElementById('avatar-img');
      let image = document.getElementById('crop-image');
      let input = document.getElementById('input-avatar-change');
      let $modal = $('#ProfileEdit');
      let cropper;

      input.addEventListener('change', function (e) {

          let files = e.target.files;
          let done = function (url) {
              image.src = url;
              $modal.modal('show');
          };

          if (files && files.length > 0) {
              let file = files[0];

              if (URL) {
                  done(URL.createObjectURL(file));
              } else if (FileReader) {
                  let reader = new FileReader();
                  reader.onload = function (e) {
                      done(reader.result);
                  };
                  reader.readAsDataURL(file);
              }
          }
      });

      $modal.on('shown.bs.modal', function () {
          cropper = new Cropper(image, {
              aspectRatio: 1,
              viewMode: 1,
          });
      }).on('hidden.bs.modal', function () {
          cropper.destroy();
          cropper = null;
      });

      document.getElementById('crop-button').addEventListener('click', function () {
          let avatar_id = $('#avatar-img').attr('data-id');
          $modal.modal('hide');
          if (cropper) {
              canvas_pic = cropper.getCroppedCanvas({
                  width: 220,
                  height: 220,
              });
              avatar.src = canvas_pic.toDataURL();
              canvas_pic = avatar.src;
          }
      
      });
  });

$(document).ready(function(){
  $("#avatar-img").click(function(){
		$("#input-avatar-change").trigger("click");
  });

     $("#save_profile").click(function(){
      let profile_id = $('#avatar-img').attr('data-id');
      let profile_name = $('#profilename').val();
      let profile_eamil = $('#profileemail').val();
      let profile_pass = $('#profilepass').val();
      let profile_grade = $('#profilegrade option:selected').text();
      $.ajax({
        url:'http://saudiclean.com.sa/test/skillflect_admin/api_con/update_profile',
        method: 'POST',
        data:{id:profile_id, name:profile_name, email:profile_eamil, password:profile_pass, grade: profile_grade, avatar:canvas_pic},
        dataType:'json',
        async:false,
        success:function(data){
          console.log(data.data);
          let get_val = data.data;
          if(get_val == ''){
        //     $(".update_notification").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
            $(".update_false").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
          }
          else{
        //     $(".update_false").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
            $(".update_notification").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
            window.location.href="/profile";
          }
        }
    });
  });
});


</script>

