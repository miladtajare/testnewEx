<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_list = new User();
        if( $request->user_Type ) { $user_list = $user_list->where('userType',$request->user_Type); }
        $user_list = $user_list->paginate(10);

        $data = [
            'title' => 'صفحه کاربران' ,
            'userList' => $user_list ,
        ];
        return view('dashboard.user' , compact('data'));
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

        $res_validate = $this->ValidateUser($request);
        if($res_validate->fails())
        {
            $message = '';
            foreach($res_validate->errors()->all() as $error)
            { $message .=  $error; }

            alert()->error($message, 'ورودی اشتباه !');
            return back();
        }


        User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'userName' => $request->userName,
            'nationalCode' => $request->nationalCode,
            'userType' => $request->userType,
            'email' => $request->email,
            'password' => Hash::make( $request->nationalCode ),
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
    public function update(Request $request, User $user)
    {
        $res_validate = $this->ValidateUserUpdate($request , $user);
        if($res_validate->fails())
        {
            $message = '';
            foreach($res_validate->errors()->all() as $error)
            { $message .=  $error; }

            alert()->error($message, 'ورودی اشتباه !');
            return back();
        }

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->userType = $request->userType;
        $user->save();
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

    public function ValidateUser($request)
    {
        return $validator = \Validator::make(request()->all(), [
            'firstName' => 'required|min:2|max:150',
            'lastName' => 'required|min:2|max:150',
            'userName' => 'required|min:2|max:150|unique:users',
            'nationalCode' => 'required|digits:10|unique:users',
            'email' => 'required|email|unique:users',
            'userType' => 'required',
            'password' => 'required',
        ]);
    }


    public function ValidateUserUpdate($request , $user)
    {
        return $validator = \Validator::make(request()->all(), [
            'firstName' => 'required|min:2|max:150',
            'lastName' => 'required|min:2|max:150',
            'userType' => 'required',
        ]);
    }


}
