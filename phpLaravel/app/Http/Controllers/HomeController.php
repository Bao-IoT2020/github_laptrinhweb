<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\paginate;
use App\Http\Controllers\sanpham;
session_start();
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
       
        $all_sanpham = DB::table('tbl_sanpham')->where('sanpham_chinh_status','1')->orderBy('sanpham_chinh_id','desc')->get();
       

        return view('pages.home')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$all_sanpham);
    }
    public function timkiem(Request $request)
    {
        $keywords = $request -> keywords_submit;
        $key_price = $request -> key_price;
        $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
        $search_product = DB::table('tbl_sanpham')->where('sanpham_chinh_name','like','%'.$keywords.'%','and')->get();
        $search_gia = DB::table('tbl_sanpham')->where('sanpham_chinh_price','like','%'.$key_price.'%')->get();

        return view('pages.sanpham.search')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('search_product',$search_product)->with('search_gia',$search_gia);
    }
}
