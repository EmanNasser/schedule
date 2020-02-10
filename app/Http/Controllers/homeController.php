<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{

    public function schedule(Request $request )
    {
        $starting_date=null;
        $num_days=null;
        $chapter_sessions=null;

        $starting_date = $request->input('start');
        $num_days = $request->input('days');
        $chapter_sessions =$request->input('sessions');
        if($starting_date==null ||$num_days==null ||$chapter_sessions==null ){
            echo json_encode("{error :\"Incorrect Parameters , please try by true Values :)\" ,data: null} ");
 
        }else{


                /*
            1 - Saturday
            2 - Sunday
            3 - Monday
            4 - Tuesday
            5 - Wednesday
            6 - Thursday
            7 - Friday
            
            */

            $week_days = ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
            $days =[];
            $days= explode(",", $num_days); // numbers of days per week assuming the start of the week is saturday
            $chapters = 30;
            $schedule = [];
            
            
            $total_sessions = (int)$chapter_sessions * (int)$chapters;
            $days_per_week = sizeof($days);
            $start = $starting_date;
            
            //this "for loop" loop according to number of sessions per week
            $week_sessions=(int)$total_sessions/(int)$days_per_week;
            for($i=0;$i<$week_sessions;$i++){

                //this "for loop" loop to get the date of everyday in this week
                for($j=0;$j<$days_per_week;$j++){
                    $last_date =strtotime($start);
                    $d ='Y-m-d';
                    $name_day=$week_days[(int)$days[$j]-1];
                    $upcommingDay = date($d, strtotime('next '.$name_day,$last_date));
                    array_push($schedule,$upcommingDay);
                    $start = $upcommingDay;
            
                }
            //die($upcommingDay);
            }

                        echo json_encode(array("days" => $days ,"schedule" => $schedule));

        }


        return view('welcome' , compact('starting_date','num_days','chapter_sessions'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
