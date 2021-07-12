<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="" dir="rtl">
        <div class="bg-secondary text-light col-12">
            @if (Route::has('login'))
                <div class=" right-0 px-6 py-4 sm:block ">
                    @auth
                        @can('show-teacher-manager')
                        <a href="{{ url('/Panel') }}" class="text-sm text-gray-700 underline"><b class="text-light bg-primary p-2">Dashboard </b></a>
                        @endcan
                        <a class=" me-2 btn btn-warning mr-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}" > {{ __('خروج') }}   {{ Auth::user()->userName }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><b class="text-light">Log in </b></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"><b class="text-light">Register </b></a>
                        @endif
                    @endauth

                </div>
            @endif

        </div>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success me-5 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            اطلاعات برنامه | مطالعه شود قبل از اجرا
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="col-12  alert alert-info"> سظح دسرسی  ساده ای اعمال شده است </div>
                <div class="col-12  alert alert-warning" >
                نوع های کاربری : 
                 همه اعضا در ابتدا دانشجو هستند و مدیر کاربری را تغییر میدهد
                </div>

                <div class="col-12 mt-4" >
                    <b> مهمان :  </b><br>
                    هیچ دسرسی ندارد فقط به صفحه اولیه نمایش درس ها دسرسی دارد 
                    نمیتواند ثبت نام کند در درسی یا نمره ببیند و ..
                </div>

                <div class="col-12 mt-4">
                <b> دانشجو : </b>
                <ul>
                <li>درس ها را ببیند  </li>
                <li>در درس ثبت نام کند </li>
                <li>نمره درس را ببیند </li>
                <li>و... </li>
                </ul>
                </div>

                <div class="col-12 mt-4">
                <b> مدیر و استاد : </b>
                <ul>
                <li> به پنل دسرسی دارند  </li>
                <li> میتوانند دوره اضافه کنند </li>
                <li> میتوانند درس اضافه کنند </li>
                <li> میتوانند نمره ثبت کنند برای دانشجو های یک درس </li>
                <li> میتوانند کاربر با نوع های مختلف اضافه کنند  </li>
                <li> ویرایش درس دوره و کاربران را دارند و ... </li>
                </ul>
                </div>

                <div class="text- alert alert-danger "> کاربر پیش فرض برای ورود به سیستم که بتوان بقیه کاربران را تغییر داد : 
                    username : admin
                    password : 12345678 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>




        <div class="row p-5 pt-3">
            @foreach( $data['class'] as $class)

            <div class="card col-lg-3 col-md-4 col-sm-12 border-0  p-2 shadow-none" style="font-size:25px;">
            <div class="col-12 shadow-sm bg-light border p-3">

                <div><small>عنوان کلاس : </small> {{$class->title_class_room}} </div>
                <div><small>شماره کلاس : </small> {{$class->number_class_room}} </div>
                <div class="mt-1 mb-3"><small>توضح کامل کلاس : </small> {{$class->description_lg_class_room}} </div>
                <div><small>خلاصه توضیح : </small> {{$class->description_sm_class_room}} </div>
                <div><small>ساعت کلاس : </small> {{$class->time_class_room}} </div>
                <div><small>زمان شروع : </small> {{$class->start_class_room}} </div>
                <div><small>زمان پایان : </small> {{$class->end_class_room}} </div>
                <div><small>زمان امتحان  : </small> {{$class->date_exam_class_room}} </div>
                <div><small>ظرفیت کلاس : </small> {{$class->capacity_class_room}} </div>
                <div class="badge rounded col-12 badge-info bg-secondary  text-white"><small>مشخصات استاد  : </small>
                @php $teacher = $class->teacher()->first() @endphp
                {{$teacher->firstName}} | {{$teacher->lastName}} | {{$teacher->nationalCode}}
                </div>
                <div class="badge rounded col-12 badge-info bg-secondary  text-white"><small> در دوره   : </small>
                @php $course = $class->course()->first() @endphp
                {{$course->title_course}}
                </div>




                <br>
                @auth

                @can('show-student')

                    @php $student_Register = $class->students()->wherePivot('student_id',Auth::user()->id)->count() @endphp
                    @if( $student_Register == 0 )

                    <form action="/register_student_to_class" method="post">
                        @csrf
                        <input type="text" hidden name="class_id" value="{{ $class->id }}">
                        <input type="submit" class="btn btn-success mt-4" value=" ثبت نام در کلاس ">
                    </form>

                    @else
                    <div class="mt-3 text-center alert-info text-dagner rounded  ">شما در این دوره شرکت کرده اید</div>

                    @php $student_Score = Auth::user()->score()->where('class_room_id',$class->id)->pluck('score_number')->first() @endphp
                    @if($student_Score != 0)
                        <div class="mt-3 text-center alert-info text-dagner rounded  ">نمره شما در این درس :  <b class="bg-primary text-white p-1"> {{ $student_Score }} </b> </div>
                    @else
                        <div class="mt-3 text-center alert-danger text-dagner rounded  font-weight-bold" style="font-size:22px;"> <small>نمره شما در این بخش نمایش داده میشود .  هنوز نمره ای برای این درس داده نشده </small></div>
                    @endif

                    @endif

                @endcan

                @else
                    <div class="mt-3 text-center alert-danger rounded ">برای ثبت نام در کلاس باید وارد شوید</div>
                @endauth



            </div>

            </div>
            @endforeach
        </div>



    </body>
</html>
