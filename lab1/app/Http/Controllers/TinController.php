<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinController extends Controller
{
    public function index(){
        return view('news');
    }
    public function about(){
        return view('about');
    }
    public function detailNews($id){
        $data = [
            'id'=>$id,
            'test'=>'Test dữ liệu truyền vào'
        ];
        return view('detailNews',$data);
    }
}
