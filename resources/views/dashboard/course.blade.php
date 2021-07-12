@extends('layouts.dashboard.master')
@section('content')
<!-- 
  title_course	
  number_course	
  description_lg_courses	
  description_sm_courses	
 -->


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
                  <form method="post" action="/course">

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">عنوان دوره</span>
                          </div>
                          <input class="form-control" type="text" name="title_course" placeholder="Enter title_course" aria-label="title_course's ">
                      </div>
                      
                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">شماره دوره</span>
                          </div>
                          <input class="form-control" type="text" name="number_course" placeholder="Enter number_course" aria-label="number_course's ">
                      </div>

                      <div class="mb-3 mt-4">
                        <label for="exampleFormControlTextarea1" class="form-label">توضیحات کامل در باره دوره </label>
                        <textarea class="form-control" name="description_lg_courses" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">خلاصه توضیحات</span>
                          </div>
                          <input class="form-control" type="text" name="description_sm_courses" placeholder="Enter description_sm_courses" aria-label="description_sm_courses's ">
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
      <div class="row">
      @foreach( $data['courseList'] as $course )
        <div class="card col-lg-4 col-md-4 col-sm-12 border-0  p-2 shadow-none" style="">
          <div class="col-12 shadow-sm border p-3">
            <span class="badge fs-20 badge-dark mb-2 ms-5"> {{ $course->id }} </span>
            <small> </small> {{ $course->title_course }} <br>
            <small>شماره دوره : </small> {{ $course->number_course }} <br>
            <div class="mt-3 mb-3"> توضیحات کامل : {{ $course->description_lg_courses }} </div>
            <small>خلاصه توضیح :  </small> {{ $course->description_sm_courses }} <br>
            
            <div class="col-12 bg-light mt-3 mb-2 d-flex justify-content-end p-2">

              <a href="/classRoom/{{$course->id}}" title="نمایش کلاس های این دوره"><i class="ml-3 text-info fs-25 fa fa-list"></i></a>

              <i class="fa fa-edit text-primary font-weight-bold fs-25" style="cursor: pointer;" data-toggle="modal" data-target="#myModaledituser{{$course->id}}"></i>

              <div class="mt-5 modal fade" id="myModaledituser{{$course->id}}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/course/{{$course->id}}">
                            @method('PATCH')
                    
                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">title_course</span>
                                </div>
                                <input class="form-control" value="{{ $course->title_course }}" type="text" name="title_course" placeholder="Enter title_course" aria-label="title_course's ">
                            </div>
                            
                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">number_course</span>
                                </div>
                                <input class="form-control" value="{{ $course->number_course }}" type="text" name="number_course" placeholder="Enter number_course" aria-label="number_course's ">
                            </div>

                            <div class="mb-3 mt-4">
                              <label for="exampleFormControlTextarea1" class="form-label">description_lg_courses textarea</label>
                              <textarea class="form-control" name="description_lg_courses" id="exampleFormControlTextarea1" rows="3"> {{ $course->description_lg_courses }} </textarea>
                            </div>

                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">description_sm_courses</span>
                                </div>
                                <input class="form-control" value="{{ $course->description_sm_courses }}" type="text" name="description_sm_courses" placeholder="Enter description_sm_courses" aria-label="description_sm_courses's ">
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
         
        </div>
      @endforeach
      </div>
 

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        
    </div>
    <div class="card-footer d-flex justify-content-center">
        {{$data['courseList']->links("pagination::bootstrap-4")}}
    </div>




    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

    
@endsection('content')

