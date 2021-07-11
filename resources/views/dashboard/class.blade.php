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
  
  
  
  
  
  <div class="alert col-12 bg-white text-decoration-none">
    کلاس های مربوط به دوره : {{ $data['course']->title_course }} |  {{ $data['course']->number_course }} |  {{ $data['course']->description_sm_courses }}
    <a href="/course" class="btn btn-danger  btn-sm mr-5 text-white text-decoration-none">بازگشت به دوره ها</a>

  </div>
  <!-- Default box -->
  <div class="card">
    
    <div class="card-header">
      <h3 class="card-title"> {{ $data['title'] }} </h3>


      <div class="card-tools">

        @if( $data['teachers']->count() != 0 )
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
          اضافه کردن
        </button>
        @else
        <div class=" p-1 alert-warnig  bg-danger"> شما ابتدا باید استادی داشته باشید تا بتوانید کلاس را به استاد نسبت بدهید</div>
        @endif

        <div class="mt-5 modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                  <button class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="/classRoom">

                      <select class="form-control mt-2 mb-5 form-control border border-danger" name="teacher_id" aria-label="Default select example">
                        <option selected >استاد این کلاس را انتحاب کنید</option>
                        @foreach( $data['teachers'] as $teacher )
                        <option value="{{$teacher->id}}">
                          {{$teacher->firstName}} | 
                          {{$teacher->lastName}} | 
                          {{$teacher->nationalCode}}
                        </option>
                        @endforeach
                      </select>

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">title_class_room</span>
                          </div>
                          <input class="form-control" type="text" name="title_class_room" placeholder="Enter title_class_room" aria-label="title_class_room's ">
                      </div>
                      
                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">number_class_room</span>
                          </div>
                          <input class="form-control"  type="text" name="number_class_room" placeholder="Enter number_class_room" aria-label="number_class_room's ">
                      </div>

                      <div class="mb-3 mt-4">
                        <label for="exampleFormControlTextarea1" class="form-label">description_lg_class_room textarea</label>
                        <textarea class="form-control" name="description_lg_class_room" id="exampleFormControlTextarea1" rows="3">  </textarea>
                      </div>

                      <div class="mb-3 mt-4">
                        <label for="exampleFormControlTextarea1" class="form-label">description_sm_class_room textarea</label>
                        <textarea class="form-control" name="description_sm_class_room" id="exampleFormControlTextarea1" rows="3"> </textarea>
                      </div>

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">time_class_room</span>
                          </div>
                          <input class="form-control"  type="time" name="time_class_room" placeholder="Enter time_class_room" aria-label="time_class_room's ">
                      </div>
                      
                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">start_class_room</span>
                          </div>
                          <input class="form-control"  type="date" name="start_class_room" placeholder="Enter start_class_room" aria-label="start_class_room's ">
                      </div>
                      
                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">end_class_room</span>
                          </div>
                          <input class="form-control"  type="date" name="end_class_room" placeholder="Enter end_class_room" aria-label="end_class_room's ">
                      </div>
                      
                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">date_exam_class_room</span>
                          </div>
                          <input class="form-control"  type="date" name="date_exam_class_room" placeholder="Enter date_exam_class_room" aria-label="date_exam_class_room's ">
                      </div>

                      <div class="mt-2 input-group">
                          <div class="input-group-append">
                              <span class="input-group-text">capacity_class_room</span>
                          </div>
                          <input class="form-control"  type="text" name="capacity_class_room" placeholder="Enter capacity_class_room" aria-label="capacity_class_room's ">
                      </div>

                      <input type="text" hidden name="courses_id" value="{{$data['course']->id}}">

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
      @foreach( $data['class'] as $class )
        <div class="card col-lg-4 col-md-4 col-sm-12 border-0  p-2 shadow-none" style="">
          <div class="col-12 shadow-sm border p-3">
            <span class="badge fs-20 badge-dark mb-2 ms-5"> {{ $class->id }} </span>
            <div><small>عنوان کلاس : </small> {{$class->title_class_room}} </div>
            <div><small>شماره کلاس : </small> {{$class->number_class_room}} </div>
            <div class="mt-1 mb-3"><small>توضح کامل کلاس : </small> {{$class->description_lg_class_room}} </div>
            <div><small>خلاصه توضیح : </small> {{$class->description_sm_class_room}} </div>
            <div><small>ساعت کلاس : </small> {{$class->time_class_room}} </div>
            <div><small>زمان شروع : </small> {{$class->start_class_room}} </div>
            <div><small>زمان پایان : </small> {{$class->end_class_room}} </div>
            <div><small>زمان امتحان  : </small> {{$class->date_exam_class_room}} </div>
            <div><small>ظرفیت کلاس : </small> {{$class->capacity_class_room}} </div>
            <div class="badge badge-light mt-2 p-2 fs-20"><small>مشخصات استاد  : </small>
              @php $teacher = $class->teacher()->first() @endphp
              {{$teacher->firstName}} | {{$teacher->lastName}} | {{$teacher->nationalCode}}
            </div>

            <div class="badge badge-light text-right col-12 mt-3 p-2 fs-20"><small> دانشجویان شرکت کننده :    
              <br><br>
              @php $students = $class->students()->get() @endphp
              @foreach( $students as $student )
                <span class="badge bg-info p-2 m-1"> 
                  {{$student->id}} -  {{$student->firstName}} | {{$student->lastName}} | {{$student->nationalCode}}

                  <button class="btn btn-sm btn-dark mr-4"  data-toggle="modal" data-target="#myModaladdnumber{{$class->id}}"><small> ثبت نمره این دانشجو در این درس </small></button>

                  <div class="mt-5 modal fade" id="myModaladdnumber{{$class->id}}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/classRoom/{{$class->id}}">
                                @method('PATCH')
                        
                                <div class="mt-2 input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">نمره این درس  برای دانشجو</span>
                                    </div>
                                    <input class="form-control"  type="text" name="Score" placeholder="Enter Score" aria-label="Score's ">
                                </div>

                                <input type="text" hidden name="courses_id" value="{{$data['course']->id}}">

                                @csrf
                                <button type="submit" class="mt-3 btn btn-sm btn-success">ثبت</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>

                </span>  
                <br>
              @endforeach
              </small>
            
            </div>
            


            <div class="col-12 bg-light mt-3 mb-2 d-flex justify-content-end p-2">


              <i class="fa fa-edit text-primary font-weight-bold fs-25" style="cursor: pointer;" data-toggle="modal" data-target="#myModaledituser{{$class->id}}"></i>

              <div class="mt-5 modal fade" id="myModaledituser{{$class->id}}">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/classRoom/{{$class->id}}">
                            @method('PATCH')
                    
                            
                            <select class="form-control mt-2 mb-5 form-control border border-danger" name="teacher_id" aria-label="Default select example">
                              <option selected >استاد این کلاس را انتحاب کنید</option>
                              @foreach( $data['teachers'] as $teacher )
                              <option value="{{$teacher->id}}">
                                {{$teacher->firstName}} | 
                                {{$teacher->lastName}} | 
                                {{$teacher->nationalCode}}
                              </option>
                              @endforeach
                            </select>

                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">title_class_room</span>
                                </div>
                                <input class="form-control" value="{{ $class->title_class_room }}" type="text" name="title_class_room" placeholder="Enter title_class_room" aria-label="title_class_room's ">
                            </div>
                            
                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">number_class_room</span>
                                </div>
                                <input class="form-control" value="{{ $class->number_class_room }}" type="text" name="number_class_room" placeholder="Enter number_class_room" aria-label="number_class_room's ">
                            </div>

                            <div class="mb-3 mt-4">
                              <label for="exampleFormControlTextarea1" class="form-label">description_lg_class_room textarea</label>
                              <textarea class="form-control" name="description_lg_class_room" id="exampleFormControlTextarea1" rows="3"> {{ $class->description_lg_class_room }} </textarea>
                            </div>

                            <div class="mb-3 mt-4">
                              <label for="exampleFormControlTextarea1" class="form-label">description_sm_class_room textarea</label>
                              <textarea class="form-control" name="description_sm_class_room" id="exampleFormControlTextarea1" rows="3"> {{ $class->description_sm_class_room }} </textarea>
                            </div>

                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">time_class_room</span>
                                </div>
                                <input class="form-control" value="{{ $class->time_class_room }}" type="time" name="time_class_room" placeholder="Enter time_class_room" aria-label="time_class_room's ">
                            </div>
                            
                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">start_class_room</span>
                                </div>
                                <input class="form-control" value="{{ $class->start_class_room }}" type="date" name="start_class_room" placeholder="Enter start_class_room" aria-label="start_class_room's ">
                            </div>
                            
                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">end_class_room</span>
                                </div>
                                <input class="form-control" value="{{ $class->end_class_room }}" type="date" name="end_class_room" placeholder="Enter end_class_room" aria-label="end_class_room's ">
                            </div>
                            
                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">date_exam_class_room</span>
                                </div>
                                <input class="form-control" value="{{ $class->date_exam_class_room }}" type="date" name="date_exam_class_room" placeholder="Enter date_exam_class_room" aria-label="date_exam_class_room's ">
                            </div>

                            <div class="mt-2 input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">capacity_class_room</span>
                                </div>
                                <input class="form-control" value="{{ $class->capacity_class_room }}" type="text" name="capacity_class_room" placeholder="Enter capacity_class_room" aria-label="capacity_class_room's ">
                            </div>
                            
                            <input type="text" hidden name="courses_id" value="{{$data['course']->id}}">

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
        {{$data['class']->links("pagination::bootstrap-4")}}
    </div>




    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

    
@endsection('content')

