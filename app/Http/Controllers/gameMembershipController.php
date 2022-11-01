<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gameMembershipController extends Controller
{
    //
    public function plan()
    {
        $plan = DB::table('plans')->get();
        //dd($plan[0]->plan_name);
        return view('index')->with('plans', $plan);
    }
    public function total(Request $request)
    {
        //  echo 'helooo';
        $input = $request->all();
        $plan = $input['plan'];
        $duration = $input['duration'];
        //echo $duration;
        $data = DB::table('plans')->where('plan_id', $plan)->get('price');
        $value = $data[0]->price * $duration;
        echo $value;
    }
    public function store (Request $request)
    {
        $input = $request->all();
        $name = $input['name'];
        $email = $input['email'];
        $mobile = $input['mobile'];
        $dob = $input['dob'];
        $plan = $input['plan'];
        $duration = $input['duration'];
        $total = $input['total'];
        $age = $input['age'];

        $data = DB::table('registation_details')->insert(['name' => $name, 'email' => $email, 'mobile' => $mobile,  'dob' => $dob,'age' => $age,'plan' => $plan, 'duration' => $duration, 'total' => $total]);
        $id = DB::getPdo()->lastInsertId();
        //dd($id);
       

        // $u=DB::table('registation_details')->where('mobile',$mobile)->get();
        $u = DB::table('registation_details')
                ->join('plans', 'registation_details.plan', '=', 'plans.plan_id')
                ->select('registation_details.*', 'plans.plan_name')
                ->where('id',$id)
                ->get();
        return view('user')->with('users', $u);

    }
    // public function user()
    // {
    //     $u = DB::table('registation_details')->get();
    //     //dd($plan[0]->plan_name);
    //     return view('user')->with('users', $u);
    // }
    
}
