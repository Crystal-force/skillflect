
let sel_opt='';
let skills_content='';
let send_comment='';
let get_id = '';
let opt_id = '';
let profile_name = '';
let profile_email = '';
let profile_pass = '';
let profile_grade = '';
let profile_id = '';

$(document).ready(function(){
  $('#subject_select').change(function(){
    sel_opt=$(this).val();
    document.getElementById('selected_sbj').innerHTML=sel_opt;
  });

  $("#notification_close").click(function(){
    $(".sbj_notification").fadeOut("slow");
  });
  $("#return_view").click(function(){
    window.history.back();
  });

});

function Select_Skill(obj){
  get_id=$(obj).attr('data-id');
  $.ajax({
    url: '/skill_list',
    method: 'POST',
    data:{ send_id: get_id},
    dataType:'json',
    async:false,
    success:function(data){
      let count = data.data.length;
      let skilllist = "";
      for(let i=0; i<count; i++){
        skilllist += '<div class="radio">\n'+
                        '<input type="radio" class="checked_id" name="positions"  id="radio-' + (i+1) + '" value="'+data.data[i].option_name+'" id="chart_subid" onclick="Checked_Skills(this)" data-id="'+data.data[i].id+'" value="'+data.data[i].id+'" >\n'+
                        '<label for="radio-' + (i+1) + '">'+data.data[i].option_name+'</label>\n'+
                      '</div>\n';
        }
      $('#positionGroup').html(skilllist);
    }
  });
}

function Checked_Skills(obj){
  skills_content = $(obj).val();
  opt_id = $(obj).attr('data-id');
  document.getElementById('checked_skills').innerHTML=skills_content;
}
function Cancel_skills(){
  document.getElementById('checked_skills').innerHTML='';
}

function Send_Data(){
  let select_sbj = $('#selected_sbj').html();
  let select_skl = $('#checked_skills').html(); 
  let user_id = $('#std_id').attr('value');
  let sub_id = $('#subject_select').find(':selected').data('id');
  // get_id = (skill id) 
  // let opt_id = ( $(obj).attr('data-id');)
  
  select_comment = $('#inp-type-5').val(); 
  if(select_sbj == '' || select_skl == '' || select_comment == ''){
    $('#sbj_nitification').delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
  }
  else{
    $.ajax({
      url:'/send_data',
      method: 'POST',
      data:{send_com:select_comment, send_uid:user_id, send_sbid:sub_id, send_skid:get_id, send_otid:opt_id},
      dataType:'json',
      async: false,
      success:function(data){
        if(data.data == '1');
        $("#success_noti").delay(5).fadeIn('slow').delay(1500).fadeOut('slow');
        document.getElementById('selected_sbj').innerHTML='';
        document.getElementById('checked_skills').innerHTML='';
        
      }
    });
  }
}

function Student_Detail(obj){
  $('#std_list').show();
  $("#class_list").hide();
 let class_id = $(obj).attr('data-id');
 $.ajax({
   url:'/get_student',
   method:'POST',
   data:{send_classid: class_id},
   dataType:'json',
   async: false,
   success:function(data){
    let count = data.data.length;
    let std_detaillist = '';
    for(let i=0; i<count; i++){
      std_detaillist+='<tr>\n'+
                        '<td><img src="http://saudiclean.com.sa/test/skillflect_admin/'+data.data[i].avatar+'" class="class-user" alt="" style="border-radius: 50%"></td>\n'+
                        '<td class="class-td">'+data.data[i].name+'</td>\n'+
                        '<td class="class-td">'+data.data[i].email+'</td>\n'+
                        '<td class="class-td">'+data.data[i].grade+'</td>\n'+
                        '<td class="class-td"><a href="/viewstudent?id='+data.data[i].id+'" class="btn btn-primary waves-effect waves-light">View</a></td>\n'+
                      '<tr>'; 
    }
    $("#std_body").html(std_detaillist);
  }
 });
}

