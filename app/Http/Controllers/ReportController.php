<?php

namespace App\Http\Controllers;

use App\report;
use Auth;
use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        if (auth()->user()->can('view all reports')) {
             $report = report::with('user')->get();
             
             $user = User::where('id', '!=', auth()->id())->get();

              // return report()->owner_id == user()->
             return view('reports.allreports', compact('report','user'));
         }
        
         else{
             
        $report = report::where('owner_id', auth()->id())->get();
        $user = Auth::user();
       
       return view('reports.index' , compact('report', 'user'));
        
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storereport = request()->validate([

            'project_name' => ['required', 'min:3'],
            'project_description' => ['required', 'min:3'],
            'no_of_hours_spend' => ['required'],
            'no_of_total_hours' => ['required'],
            'time_in' => ['required'],
            'time_out' => ['required'],
            'no_of_hours_in_office' => ['required'],
            'no_of_hour_out_of_office' => ['required'],

            ]);
           
            $storereport['owner_id']= auth()->id();

       
         report::create($storereport);
        
         return redirect('/reports' )->with('alert', 'Updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(report $report)
    {
        $user = Auth::user();

        // $report = report::with('user')->get();

        if (Auth::user()->id === $report->owner_id || auth()->user()->can('view all reports') )
        {

        return view('reports.show', compact('report', 'user'));
        }
        else {
                $report = report::where('owner_id', auth()->id())->get();
            
                return redirect('/profiles')->with('message', 'you are NOT ALLOWED to view others reports');
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(report $report)
    {
        if (Auth::user()->id === $report->owner_id)
            {
                return view('reports.edit' , compact('report')); 
            }
            else{
                return redirect('/profiles')->with('message', 'You are NOT ALLOWED to edit others reports');
            } 
         }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, report $report)
    {
        $report->update(request()->validate([

            'project_name' => ['required', 'min:3'],
            'project_description' => ['required', 'min:3'],
            'no_of_hours_spend' => ['required'],
            'no_of_total_hours' => ['required'],
            'time_in' => ['required'],
            'time_out' => ['required'],
            'no_of_hours_in_office' => ['required'],
            'no_of_hour_out_of_office' => ['required'],

        ]));
           
            $report['owner_id']= auth()->id();
           
        $report['owner_id']= auth()->id();
        return redirect('/reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(report $report)
    {
        if (Auth::user()->id === $report->owner_id) {
            $report->delete();
            return redirect('/reports');
   } else {
       return redirect('/reports')->with('message', 'you are not allowed'); 
   }
   
    }
    public function get_user_reports($id)
    {
        $report = report::where('owner_id', $id)->with('user')->orderBy('id', 'DESC')->get();
        return view('reports.user_reports', compact('report'));
    }
}
