<?php

namespace App\Http\Controllers;

use App\report;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
             
        $report = report::where('owner_id', auth()->id())->orderBy('id', 'DESC')->get();
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

        $objectData = (array)$request->project_name;

        $objectData2 = (array)$request->project_description;
        print_r($objectData2);
        die();
        $objectData3 = (array)$request->no_of_hours_spend;
        
        $storereport = request()->validate([


            'project_name'=>['required'],
            'project_description'=>['required'],
            'no_of_hours_spend'=>['required'],


            'time_in' => ['required'],
            'time_out' => ['required'],
            'no_of_hours_in_office' => ['required'],
            'no_of_hour_out_of_office' => ['required'],

            ]);

            $storereport['owner_id']= auth()->id();

            report::create($storereport);

         //   $x=unserialize();
           
            
           

            // print_r(count($objectData));
            //      die();
            //  for ($i=0; $i < count($objectData); ++$i) 
            //  {
            //      //$storereport= new report;        
            //      $storereport->project_name = $request['project_name'][$i];
            //      $storereport->project_description= $request['project_description'][$i];
            //      $storereport->no_of_hours_spend= $request['no_of_hours_spend'][$i];
            //      $storereport->save();  
            //  }

             // print_r($storereport);
            // die();

          


        // $rules = [];


        // foreach($request->input('project_name','project_description','no_of_hours_spend') as $key) {
            
        //     $rules["project_name.{$key}"] = 'required';
        //     $rules["project_description.{$key}"] = 'required';
        //     $rules["no_of_hours_spend.{$key}"] = 'required';
            

        // }


        // $validator = Validator::make($request->all(), $rules);


        // if ($validator->passes()) {


        //     foreach($request->input('project_name','project_description','no_of_hours_spend') as $key => $value) {

        //         report::create(
                    
        //             ['project_name'=>$value],
        //             ['project_description'=>$value],
        //             ['no_of_hours_spend'=>$value],
        //             $storereport
                
        //         );
        //     }


        //     return response()->json(['success'=>'done']);
        // }


        // return response()->json(['error'=>$validator->errors()->all()]);
    
     
        // count('project_name')
      
            
            
     
           
         

       
          
        //         $user = 'test@gmail.com';
        //  Mail::to($users)->send(new reportsended);
        
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
         
       
            'project_name[$i]' => ['required', 'min:3'],
            'project_description[$i]' => ['required', 'min:3'],
            'no_of_hours_spend[$i]' => ['required'],
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

    public function search_person(Request $request)
    {

        if ($request->ajax())
        {

            $output = '';
        $search = $request->get('search');  

        if($search != '')
        {
           $report = report::where('project_name','LIKE', '%' . $search . '%' )->get();

          
        }
        else{
            $report = report::where('owner_id', $id)->with('user')->orderBy('id', 'DESC')->get();

        }
        $total_data = $report->count();

            if($total_data > 0){
                    foreach ($report as $reports) {
                            $output .= '
                            <div class="changing">
              
           
                            <ul>
                               <div class="container-fluid mt--7">
                                  <div class="card">
                                     '.$reports->user->name.'
                                     <h3><a href="/reports/ '.$reports->id.' ">
                                      '.$reports->project_name.'
                                      </a>  </h3>
                                     <h5>
                                     date of creation : '.$reports->created_at->format('m/d/Y') .' 
                                     </h5>
                                     <h5> 
                                     Time of creation : '.$reports->created_at->format('H:i:s').' </h5>
                                  </div>
                               </div>
                            </ul>
                            <br>
                            <hr style="background-color: #fff;
                               border-top: 2px dashed #8c8b8b">
                            <br>
                         </div>
                            
                            ';   
                    }
            } 
            
            else{

                $output = '
                <div class="card-body" style="color:blue;">
                
                <div class="container-fluid mt--7">
                 <div class="card">

                        <b> NO RECORD FOUND </b>
                 </div>
                 </div>
                
                
                </div>
                
                ';
            }  
            
          return $output;  
    
    }

    
    }
}
