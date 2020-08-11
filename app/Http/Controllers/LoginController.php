<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use File;
use Session;

class LoginController extends Controller
{
    public function index(){
        Session()->flush();
      $teacher_info = DB::table('teacher')->get();
      return view('login', compact(['teacher_info']));
    }
    public function Studend_Login(Request $request){
       
      $get_status = $request->get('send_std');
      $get_name = $request->get('send_name');
      $get_pass = $request->get('send_pass');
    
      if($get_status == '1'){
        $data_std = DB::table('gary_user')->get();
        $data_sbj = DB::table('subject')->get();
        $data_skill = DB::table('skill')->get();
        $data_res = DB::table('gary_user')->where('username', $get_name)->where('password', $get_pass)->get();
        $data_id = DB::table('gary_user')->where('username', $get_name)->where('password', $get_pass)->get('id');
        if(sizeof($data_res)== '1')
        { 
          Session::put('data_id', $data_id);
          Session::put('data_std', $data_res);
          Session::put('data_sbj', $data_sbj);
          Session::put('data_skill', $data_skill);
          $status_1="1";
          return response()->json(['data'=>$status_1]);
        } 
       else{
        $status = "2";
         return response()->json(['data'=>$status]);
       }
      }
     
    }

   public function ClassShow(Request $request){
      $tch_sbj = DB::table('subject')->get();
      $tch_status= $request->get('send_tch');
      $tch_name = $request->get('send_name');
      $tch_pass = $request->get('send_pass');
      if($tch_status == '2'){
        $data_res = DB::table('teacher')->where('username', $tch_name)->where('password', $tch_pass)->get();
        try {
          $tch_id =(array) $data_res[0]->id;
          $data_class = DB::table('class')->where('teacher_id',intval($tch_id[0]))->get();
          if(sizeof($data_res)){
              Session::put('data_id',  $tch_id);
            $status_1 = '1';
            return response()->json(['data'=>$status_1]);
          }
        } catch (\Throwable $th) {
          $status = '2';
          return response()->json(['data'=>$status]);
        }
      }
    }
}
