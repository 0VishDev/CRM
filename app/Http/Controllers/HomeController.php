<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function index2()
    {
        //$fetch = DB::table('reports')->get();
        $post1 = DB::table('companies')->get();
         
         $post=$post1->unique('emp_name');
        foreach($post as $row)
        {
            $data[] = array
            (
                'label'=>$row->emp_name,
                'y'=>$row->user_id,

            );
        }
        return view('admin.dashboard',["data" => $data]);
    }
}
