
@extends('layout.index')
@section('content')
<div id="single-wrapper">
	<div class="frm-single" >
		<div class="inside">
      <div class="alert alert-danger alert-dismissible" id="log_notification" role="alert"> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning! </strong> You are not registered for this service! 
      </div>
			<div class="title"><strong>Skillflect</strong></div>
        <div class="frm-title">Login</div>
          <ul class="list-inline login-select-btn">
            <li class="margin-bottom-10"><button type="button" class="btn btn-primary btn-bordered waves-effect waves-light std-btn" id="checked_std" value="1">Student</button></li>
            <li class="margin-bottom-10"><button type="button" class="btn btn-danger btn-bordered waves-effect waves-light tch-btn" id="checked_tch" value="2" >Teacher</button></li>
          </ul>
          <form data-toggle="validator" id="form_send">
            <div class="form-group">
              <label for="inputName" class="control-label">Name</label>
              <input type="text" class="form-control" id="check_name" placeholder="Please insert name" required>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="control-label">Password</label>
              <div class="row">
                <div class="form-group col-sm-12">
                  <input type="password" data-minlength="6" class="form-control" id="check_pass" placeholder="Please insert password" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary waves-effect waves-light" id="login_user">Login</button>
            </div>
            <div class="frm-footer">Skillflect © 2020.</div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><!--/#single-wrapper -->

@endsection
<script src="assets/scripts/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#checked_std').click(function(){
      $(this).removeClass("btn-bordered");
      $("#checked_tch").addClass("btn-bordered");
      let std_val = $(this).attr('value');
      $('form').on('submit', function(e){
        let check_username=$('#check_name').val();
        let check_pass=$('#check_pass').val();
          e.preventDefault();
          $.ajax({
            url:'/skillhome',
            method:'post',
            data:{send_std: std_val, send_name: check_username, send_pass: check_pass},
            dataType:'json',
            async:false,
            success: function(data){
              if(data.data == '1'){
                window.location.href="/studentpage";
              }
              else if(data.data== '2'){
                $('#log_notification').show();
              }
            }
          });
      });

    });

    $("#checked_tch").click(function(){
      $(this).removeClass("btn-bordered");
      $("#checked_std").addClass("btn-bordered");
      let tch_val = $(this).attr('value');
      $('form').on('submit', function(e){
        let check_tchname = $('#check_name').val();
        let check_tchpass = $('#check_pass').val();
        e.preventDefault();
        $.ajax({
          url:'/tchclass',
          method: 'POST',
          data: {send_tch: tch_val, send_name: check_tchname, send_pass: check_tchpass},
          dataType: 'json',
          async: false,
          success: function(data){
            if(data.data == '1'){
                window.location.href="/classlist";
            }
            else if(data.data== '2'){
              $('#log_notification').show();
            }
          }
        });
      });
    })
});
</script>
	