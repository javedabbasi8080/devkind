<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
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

    public function logs()
    {

        $auditsData = DB::table('audits')->get();

        foreach ($auditsData as $key => $auditable_id) {

            $model = "\ ".$auditable_id->auditable_type;
            $models = str_replace(" ", "", $model);
            $data['audits'][$key] = $models::find($auditable_id->auditable_id)->audits;

        }


        foreach ($data['audits'] as $keyAu => $valueAu) {
            $data['loggData'][$keyAu] = $data['audits'][$keyAu][0];
        }

        $data['audits'] = $data['loggData'];
        
        return view('logs',$data);
    }
}
