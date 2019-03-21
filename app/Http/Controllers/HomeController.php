<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Illuminate\Http\Request;

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
        // role::create([
            
        //     'name'=>'employees',
        //     'name'=>'admin'
        
        // ]);

        // permission::create([

        //     //'name'=>'create reports',
        //     'name'=>'view all reports',
        //     //'name'=>'view reports'
        // ]);

      
       $user = Auth::user();
        return view('home' , compact('user') );
    }
    
}
