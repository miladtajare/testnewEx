<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Models\Course;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'صفحه کلاس ها ' ,
            'classRoomList' => ClassRoom::paginate(10) ,
        ];
        return view('dashboard.class' , compact('data'));
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
        
        $res_validate = $this->ValidateClass($request);
        if($res_validate->fails())
        {
            $message = '';
            foreach($res_validate->errors()->all() as $error)
            { $message .=  $error; }

            alert()->error($message, 'ورودی اشتباه !');
            return back();
        }

        ClassRoom::create([
            'title_class_room' => $request->title_class_room , 
            'number_class_room' => $request->number_class_room , 
            'description_lg_class_room' => $request->description_lg_class_room , 
            'description_sm_class_room' => $request->description_sm_class_room , 
            'time_class_room' => $request->time_class_room , 
            'start_class_room' => $request->start_class_room , 
            'end_class_room' => $request->end_class_room , 
            'date_exam_class_room' => $request->date_exam_class_room , 
            'capacity_class_room' => $request->capacity_class_room ,
            'courses_id' => $request->courses_id ,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_course)
    {
        $data = [
            'title' => ' کلاس ها ',
            'course' => $course = Course::find($id_course),
            'class'=> $course->classrooms()->paginate(10),
        ];

        return view('dashboard/class',compact('data'));

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
        
        $res_validate = $this->ValidateClass($request);
        if($res_validate->fails())
        {
            $message = '';
            foreach($res_validate->errors()->all() as $error)
            { $message .=  $error; }

            alert()->error($message, 'ورودی اشتباه !');
            return back();
        }
        
        $classroom = ClassRoom::find($id);
        $classroom->title_class_room = $request->title_class_room ;
        $classroom->number_class_room = $request->number_class_room ;
        $classroom->description_lg_class_room = $request->description_lg_class_room ;
        $classroom->description_sm_class_room = $request->description_sm_class_room ;
        $classroom->time_class_room = $request->time_class_room ;
        $classroom->start_class_room = $request->start_class_room ;
        $classroom->end_class_room = $request->end_class_room ;
        $classroom->date_exam_class_room = $request->date_exam_class_room ;
        $classroom->capacity_class_room = $request->capacity_class_room;
        $classroom->courses_id = $request->courses_id;
        $classroom->save();
        return back();
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


    public function ValidateClass($request)
    {
        return $validator = \Validator::make(request()->all(), [
            'title_class_room' => 'required|min:2|max:100',
            'number_class_room' => 'required|numeric',
            'description_lg_class_room' => 'required|min:2|max:1000',
            'description_sm_class_room' => 'required|min:2|max:200',
            'time_class_room' => 'required',
            'start_class_room' => 'required|date',
            'end_class_room' => 'required|date',
            'date_exam_class_room' => 'required|date',
            'capacity_class_room' => 'required|numeric',
            'courses_id' => 'required|numeric',

        ]);
    }


}
