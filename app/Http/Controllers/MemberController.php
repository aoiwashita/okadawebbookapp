<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function remove_member(Request $request)
    {
      $user_id = 1; //$request
      $item = DB::table('members')->where('user_id',$user_id)->first();
      return view('member_withdrawal',['item'=>$item]);
    }
    public function delete_member(Request $request)
    {
      // 退会年月日を追記する
      $param = ['user_deleteday' => $request -> user_deleteday];
      $data = DB::table('members')->where('user_id', $request->user_id)->update($param);
      return view('member_withdrawal_complete');
    }
}
