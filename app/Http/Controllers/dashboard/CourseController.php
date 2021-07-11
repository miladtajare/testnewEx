<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'صفحه دوره ها ' ,
            'courseList' => Course::paginate(10) ,
        ];
        return view('dashboard.course' , compact('data'));
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

        $res_validate = $this->ValidateCourse($request);
        if($res_validate->fails())
        {
            $message = '';
            foreach($res_validate->errors()->all() as $error)
            { $message .=  $error; }

            alert()->error($message, 'ورودی اشتباه !');
            return back();
        }

        Course::create([
            'title_course' => $request->title_course,
            'number_course' => $request->number_course,
            'description_lg_courses' => $request->description_lg_courses,
            'description_sm_courses' => $request->description_sm_courses,
        ]);
        return back();
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
    public function update(Request $request, Course $course)
    {

        $res_validate = $this->ValidateCourse($request);
        if($res_validate->fails())
        {
            $message = '';
            foreach($res_validate->errors()->all() as $error)
            { $message .=  $error; }

            alert()->error($message, 'ورودی اشتباه !');
            return back();
        }


        $course->title_course = $request->title_course;
        $course->number_course = $request->number_course;
        $course->description_lg_courses = $request->description_lg_courses;
        $course->description_sm_courses = $request->description_sm_courses;
        $course->save();
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


    public function ValidateCourse($request)
    {
        return $validator = \Validator::make(request()->all(), [
            'title_course' => 'required|min:2|max:100',
            'number_course' => 'required|unique:courses|numeric',
            'description_lg_courses' => 'required|min:2|max:1000',
            'description_sm_courses' => 'required|min:2|max:200',
        ]);
    }


}
