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
    //杉澤さん
    public function edit_member(Request $request){
      // 会員情報をDBから取ってくる処理など記述する箇所
      $user_id = 1; # あとで$id = $request->id;に書き換えよう
      $user_data = DB::table('members')->where('user_id', $user_id)->first();
      return view('member_edit', ['user_data' => $user_data]);
    }

    public function edit_member_check(Request $request){
      $this->validate($request, Member::$edit_member_rules, Member::$edit_member_messages);
      $edit_member_data = $request->all();
      $request->session()->put($edit_member_data);
      return view('member_edit_confirming', compact("edit_member_data"));
    }

    public function update_member(Request $request){
      $edit_member_data = $request->all();
      // // 新しい会員情報に更新する処理を記述する箇所
      //
      $request->session()->put($edit_member_data);
      // 教科書p219参考
      $user_id = 1; //TODO あとで変える
      $param = [
        'user_name' => $request->user_name,
        'user_address' => $request->user_address,
        'user_tel' => $request->user_tel,
        'user_email' => $request->user_email
      ];
      // 会員情報のアップデート
      DB::table('members')->where('user_id', $user_id)->update($param);

      // アップデート後のデータを取得
      $user_data = DB::table('members')->where('user_id', $user_id)->first();
      return view('member_edit_complete', ['user_data' => $user_data]);
    }

    //岡田さん
    public function add_member(Request $request)
  {
       return view('member_register');
  }

  public function add_member_check(Request $request)
  {
       $this->validate($request, Member::$rules_member_register, Member::$message_member_register);
       $data = $request->all();
       $request->session()->put($data);
       return view('member_register_confirming',['data' => $data]);
  }

  public function create_member(Request $request)
  {
       $action = $request->get('action','back');
       $input = $request->except('action');
       if($action === 'back') {
           return redirect()->action('MemberController@add_member')->withInput($input);
       } else if($action === 'next'){
       $member = new Member;
       $member->user_name = $request->user_name;
       $member->user_address = $request->user_address;
       $member->user_tel = $request->user_tel;
       $member->user_email = $request->user_email;
       $member->user_birthday = $request->user_birthday;
       $member->user_joindate = $request->user_joindate;
       unset($member['_token']);
       $member->save();
       return view('member_register_complete',['form' => Member::find($member->user_id)]);
       }
  }
}
