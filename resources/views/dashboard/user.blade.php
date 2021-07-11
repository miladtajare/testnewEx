@extends('layouts.dashboard.master')
@section('content')

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"> {{ $data['title'] }} </h3>

      <div class="card-tools">

        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
          اضافه کردن
        </button>

        <div class="mt-5 modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                  <button class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="/user">

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">firstName</span>
                          </div>
                          <input class="form-control" type="text" name="firstName" placeholder="Enter firstName" aria-label="firstName's ">
                      </div>

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">lastName</span>
                          </div>
                          <input class="form-control" type="text" name="lastName" placeholder="Enter lastName" aria-label="lastName's ">
                      </div>

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">userName</span>
                          </div>
                          <input class="form-control" type="text" name="userName" placeholder="Enter userName" aria-label="userName_participant's ">
                      </div>
                      
                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">nationalCode</span>
                          </div>
                          <input class="form-control" type="text" name="nationalCode" placeholder="Enter nationalCode" aria-label="nationalCode_participant's ">
                      </div>

                      <select class="form-select form-control" name="userType" aria-label="Default select example">
                        <option selected>user type select</option>
                        <option value="teacher">teacher</option>
                        <option value="student">student</option>
                        <option value="manager">manager</option>
                        <option value="guest">guest</option>
                      </select>

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">email</span>
                          </div>
                          <input class="form-control" type="text" name="email" placeholder="Enter email" aria-label="email_participant's ">
                      </div>

                      @csrf
                      <button type="submit" class="mt-3 btn btn-sm btn-success">ثبت</button>
                  </form>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
    <div class="card-body">

      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="text-center">id</th>
            <th scope="col" class="text-center">firstName</th>
            <th scope="col" class="text-center">lastName</th>
            <th scope="col" class="text-center">userName</th>
            <th scope="col" class="text-center">nationalCode</th>
            <th scope="col" class="text-center">email</th>
            <th scope="col" class="text-center">userType</th>
            <th scope="col" class="text-center bg-light">Access</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $data['userList'] as $user )
          <tr>
            <td class="text-center" > {{ $user->id }}</td>
            <td class="text-center" > {{ $user->firstName }}</td>
            <td class="text-center" > {{ $user->lastName }}</td>
            <td class="text-center" > {{ $user->userName }}</td>
            <td class="text-center" > {{ $user->nationalCode }}</td>
            <td class="text-center" > {{ $user->email }}</td>
            <td class="text-center" > {{ $user->userType }}</td>
            <td class="text-center bg-light"> </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        
    </div>
    <div class="card-footer d-flex justify-content-center">
        {{$data['userList']->links("pagination::bootstrap-4")}}
    </div>




    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

    
@endsection('content')