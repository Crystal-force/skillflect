<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use File;
use Session;
use Carbon\Carbon;




class UserController extends Controller
{

    public function StudentPage(Request $request){
      $value = $request->session()->get('data_id');
      $chg_val = (array)$value[0];
      $chg_val['id'];
      $profile_alldata = DB::table('gary_user')->where('id', $chg_val['id'])->get();
      return view('studenthome', compact(['profile_alldata']));      
    }

    public function SelectedSkill(Request $request){
      $selected_id = $request->get('send_id');
      $skills_list = DB::table('skilloption')->where('skill_id', $selected_id)->get();
      return response()->json(['data' => $skills_list]);
    }
    public function SaveData(Request $request){
      $save_com = $request->get('send_com');
      $save_sbid = $request->get('send_sbid');
      $save_uid = $request->get('send_uid');
      $save_skid = $request->get('send_skid');
      $save_opid = $request->get('send_otid');
      
      $now_time = new \DateTime('NOW');
      $change_time = $now_time->format('Y/m/d H:i');
      $data = array('datetime' => $change_time, 'user_id' => $save_uid, 'subject_id' => $save_sbid, 'skill_id' => $save_skid, 'option_id' => $save_opid, 'used' => $save_com );
      $res = DB::table('history')->insert($data);
      $status_one = '1';
      $status_two = '0';
      if($res == 'true'){
        return response()->json(['data'=> $status_one]);
      }
      
    }

    public function Profile(Request $request){
       $value = $request->session()->get('data_id');
        $chg_val = (array)$value[0];
      $profile_alldata = DB::table('gary_user')->where('id', $chg_val['id'])->get();
      return view('student-profile', compact(['profile_alldata']));

    }
// All chart list
    public function AllData(Request $request){
      $value = $request->session()->get('data_id');
      $chg_val = (array)$value[0];
      $profile_alldata = DB::table('gary_user')->where('id', $chg_val['id'])->get();
      return view('alldata' , compact(['profile_alldata']));
    }



    public function AllChartData(Request $request){
      $chart_sbjid = $request->get('send_chartid');  
      $chart_stdid = $request->get('send_id');  
      $skills_alldata = DB::table('history')->where('user_id', $chart_stdid)->get('skill_id');
     
      $arr = array();
      foreach ($skills_alldata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $arr_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $arr_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$arr_cnt, 'sum'=>$sum));
    }

    public function AllChartAjaxData($select_chartid)
    {
      $data_id = $select_chartid;
      
      $skills_alldata = DB::table('history')->where('user_id', $data_id)->get('skill_id');
      $arr = array();
      foreach ($skills_alldata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $arr_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $arr_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$arr_cnt, 'sum'=>$sum));
    }

    public function ChartSelectData(Request $request){
      $select_chartski = $request->get('send_selectid');
      $select_chartid = $request->get('send_selid');
      if($select_chartski == null) { return $this->AllChartAjaxData($select_chartid);}
      $skills_alldata = DB::table('history')->where('user_id', $select_chartid)->where('subject_id', $select_chartski)->get('skill_id');
      $arr = array();
      foreach ($skills_alldata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $arr_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $arr_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$arr_cnt, 'sum'=>$sum));
    }

    public function TotalViewData(Request $request){
      $user_id = $request->get('send_nserid');
      $data = DB::table('history')->leftJoin('skill', function($join) {
        $join->on('history.skill_id', 'skill.id');
      })->leftJoin('skilloption', function($join) {
        $join->on('history.option_id', 'skilloption.id');
      })->select('history.*', 'skill.name as skillname', 'skilloption.option_name as skilloptionoption_name')
      ->where('history.user_id', $user_id)
      ->get();
      return response()->json(['data'=>$data]);
    }
// thisweek chart list
    public function ThisWeek(Request $request){
      $value = $request->session()->get('data_id');
      $chg_val = (array)$value[0];
      $profile_alldata = DB::table('gary_user')->where('id', $chg_val['id'])->get();
      return view('thisweek', compact(['profile_alldata']));
    }

    public function AllWeek(Request $request){
      $get_weekid = $request->get('send_chartid');
      $week_userid = $request->get('send_id');

      $now_time = new \DateTime('NOW');
      $change_time = $now_time->format('Y/m/d');
      $end_date = date('Y/m/d', strtotime("-7 days"));
      $skills_weekdata = DB::table('history')->whereBetween('datetime',[$end_date, $change_time])->where('user_id',$week_userid)->get('skill_id');
      $arr = array();
      foreach ($skills_weekdata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $arr_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $arr_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$arr_cnt, 'sum'=>$sum));
    }

    public function WeekChartAjaxData($select_weekid)
    {
      $data_id = $select_weekid;
      
      $chart_sbjid = 0;
     $now_time = new \DateTime('NOW');
      $change_time = $now_time->format('Y/m/d');
      $end_date = date('Y/m/d', strtotime("-7 days"));
      $skills_weekdata = DB::table('history')->whereBetween('datetime',[$end_date, $change_time])->where('user_id',$data_id)->get('skill_id');
      $arr = array();
      foreach ($skills_weekdata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $arr_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $arr_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$arr_cnt, 'sum'=>$sum));
    }

    public function SelectWeek(Request $request){
      $select_weekski = $request->get('send_selectid');
      $select_weekid = $request->get('send_selid');
      if($select_weekski == null) { return $this->WeekChartAjaxData($select_weekid);}
      $now_time = new \DateTime('NOW');
      $change_time = $now_time->format('Y/m/d');
      $end_date = date('Y/m/d', strtotime("-7 days"));
      $skills_allweekdata = DB::table('history')->whereBetween('datetime',[$end_date, $change_time])->where('user_id', $select_weekid)->where('subject_id', $select_weekski)->get('skill_id');
      $arr = array();
      foreach ($skills_allweekdata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $week_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $week_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$week_cnt, 'sum'=>$sum));
    }
// This month chart list
    public function ThisMonth(Request $request){
      $value = $request->session()->get('data_id');
      $chg_val = (array)$value[0];
      $profile_alldata = DB::table('gary_user')->where('id', $chg_val['id'])->get();
      return view('thismonth', compact(['profile_alldata']));
    }
    public function AllMonth(Request $request){
      $get_weekid = $request->get('send_chartid');
      $week_userid = $request->get('send_id');

      $now_time = new \DateTime('NOW');
      $change_time = $now_time->format('Y/m/d');
      $end_date = date('Y/m/d', strtotime("-30 days"));
      $skills_weekdata = DB::table('history')->whereBetween('datetime',[$end_date, $change_time])->where('user_id',$week_userid)->get('skill_id');
      $arr = array();
      foreach ($skills_weekdata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $arr_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $arr_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$arr_cnt, 'sum'=>$sum));
    }

    public function MonthChartAjaxData($select_monthid){
      $data_id = $select_monthid;
      $now_time = new \DateTime('NOW');
      $change_time = $now_time->format('Y/m/d');
      $end_date = date('Y/m/d', strtotime("-30 days"));
      $skills_monthdata = DB::table('history')->whereBetween('datetime',[$end_date, $change_time])->where('user_id',$data_id)->get('skill_id');
      $arr = array();
      foreach ($skills_monthdata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $arr_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $arr_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$arr_cnt, 'sum'=>$sum));
    }


    public function SelectMonth(Request $request){
      $select_weekski = $request->get('send_selectid');
      $select_monthid = $request->get('send_selid');
      if($select_weekski == null) { return $this->MonthChartAjaxData($select_monthid);}
      $now_time = new \DateTime('NOW');
      $change_time = $now_time->format('Y/m/d');
      $end_date = date('Y/m/d', strtotime("-30 days"));
      $skills_allweekdata = DB::table('history')->whereBetween('datetime',[$end_date, $change_time])->where('user_id', $select_monthid)->where('subject_id', $select_weekski)->get('skill_id');
      $arr = array();
      foreach ($skills_allweekdata as $skill) {
        $arr[] = $skill->skill_id;
      }
      $month_cnt = array();
      $sum = 0;
      foreach(array_count_values($arr) as $key=>$val) {
        if ($key == 0) continue;
        $name = DB::table('skill')->where('id', $key)->first();
        $month_cnt[] = array('name'=>$name->name, 'val'=>$val);
        $sum += $val;
      }
      return response()->json(array('array'=>$month_cnt, 'sum'=>$sum));
    }

   

// class list 
    public function ClassList(Request $request){
      $value = $request->session()->get('data_id');
      $chg_val = (array)$value[0];
      $profile_alldata = DB::table('teacher')->where('id', $chg_val[0])->get();
      $class_list = DB::table('class')->where('teacher_id', $chg_val[0])->get();
      return view('classlist', compact(['profile_alldata','class_list']));
    }
    
    public function StudentList(Request $request){
      $value = $request->session()->get('data_id');
      $chg_val = (array)$value[0];
      $profile_alldata = DB::table('teacher')->where('id', $chg_val[0])->get();
      $get_class_id = $request->get('id');
      $std_data = DB::table('class')->where('id',$get_class_id)->get('student_ids');
      
      $clean_data = $std_data[0]->student_ids;
      $first_change = str_replace('[','', $clean_data);
      $second_change = str_replace(']','', $first_change);
      $third_change = explode(',', $second_change);
      $count = count($third_change);
      
      $data_std = DB::table('gary_user')->whereIn('id', $third_change)->get();
      return view('student_list', compact(['profile_alldata','data_std']));
    }


      public function ViewStudent(Request $request){
        $class_id = $request->id;
        $tch_sbj = DB::table('subject')->get();
        $Class_user = DB::table('gary_user')->where('id',$class_id)->get();
        return view('classallchart', compact(['Class_user','tch_sbj']));
      }
      
      public function ViewWeek(Request $request){
        $class_id = $request->id;
        $tch_sbj = DB::table('subject')->get();
        $Class_user = DB::table('gary_user')->where('id',$class_id)->get();
        return view('classweekdata',compact(['Class_user','tch_sbj']));
      }
      public function ViewMonth(Request $request){
        $class_id = $request->id;
        $tch_sbj = DB::table('subject')->get();
        $Class_user = DB::table('gary_user')->where('id',$class_id)->get();
        return view('classmonthdata',compact(['Class_user','tch_sbj']));
      }
   }
