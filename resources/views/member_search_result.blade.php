@extends('layouts.webbookapp')

 @section('content')
 <!-- 検索ボックス -->
 <form method="post" action="/member_search_result">
  @csrf
<input type="text" name="user_email" value="{{$user_email['user_email']}}" required>
   <input type="submit" value="検索">
 </form>
<!-- <div>{{$user_email['user_email']}}</div> -->
 検索結果

  <table>
    <tr><th>会員ID</th><td></td></tr>
    <tr><th>名前</th><td></td></tr>
    <tr><th>生年月日</th><td></td></tr>
    <tr><th>住所</th><td></td></tr>
    <tr><th>電話番号</th><td></td></tr>
    <tr><th>メールアドレス</th><td></td></tr>
  </table>
  <form method="post" action="/member_edit">
   <input type="submit" value="編集する">
    </form>
  <form method="post" action="/member_withdrawal">
   <input type="submit" value="退会する">
   </form>
  @endsection
