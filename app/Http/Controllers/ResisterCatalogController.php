<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResisterCatalogController extends Controller
{
  public function remove_document(Request $request)
  {
    $catalog_id = 1; //$request
    $item = DB::table('registers')->join('catalogs','registers.catalog_number','=','catalogs.catalog_number')
    ->where('registers.catalog_id',$catalog_id)->first();
    return view('document_delete',['item'=>$item]);
  }

  public function delete_document(Request $request)
  {
    //廃棄年月日と尾行を追記
    $param = ['disposal_date' => $request -> disposal_date,
              'catalog_remark' => $request -> catalog_remark,];
    $data = DB::table('registers')->where('catalog_id', $request->catalog_id)->update($param);
    return view('document_delete_complete');
  }
}
