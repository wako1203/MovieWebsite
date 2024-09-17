    <!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>
            Admin
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta
        name="keywords"
        content="Admin"
        />
        <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

                        function hideURLbar() { window.scrollTo(0, 1); }
        </script>
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('backend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <!-- Custom CSS -->
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
        <!-- font-awesome icons CSS -->
        <link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet" />
        <!-- //font-awesome icons CSS-->
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" >
        <!-- side nav css file -->
        <link
        href="{{asset('backend/css/SidebarNav.min.css')}}"
        media="all"
        rel="stylesheet"
        type="text/css"
        />
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- //side nav css file -->
        <!-- js-->
        <script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('backend/js/modernizr.custom.js')}}"></script>
        <!--webfonts-->
        <link
        href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet"
        />
        <!--//webfonts-->
        <!-- chart -->
        <script src="{{asset('backend/js/Chart.js')}}"></script>
        <!-- //chart -->
        <!-- Metis Menu -->
        <script src="js/metisMenu.min.js"></script>
        <script src="{{asset('backend/js/custom.js')}}"></script>
        <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" />
        <!--//Metis Menu -->
        <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }

        
        html {
           background: url({{ asset("../public/imgs/HInh2.jpg") }});
           /* background: url("https://media.zicxa.com/2360244"); */
           background-repeat: no-repeat;
           background-size: cover;
        }
        </style>

        <!--pie-chart -->
        <!-- index page sales reviews visitors pie chart -->
        <script src="{{asset('backend/js/pie-chart.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
            barColor: '#2dde98',
            trackColor: '#eee',
            lineCap: 'round',
            lineWidth: 8,
            onStep: function (from, to, percent) {
                $(this.element)
                .find('.pie-value')
                .text(Math.round(percent) + '%');
            },
            });

            $('#demo-pie-2').pieChart({
            barColor: '#8e43e7',
            trackColor: '#eee',
            lineCap: 'butt',
            lineWidth: 8,
            onStep: function (from, to, percent) {
                $(this.element)
                .find('.pie-value')
                .text(Math.round(percent) + '%');
            },
            });

            $('#demo-pie-3').pieChart({
            barColor: '#ffc168',
            trackColor: '#eee',
            lineCap: 'square',
            lineWidth: 8,
            onStep: function (from, to, percent) {
                $(this.element)
                .find('.pie-value')
                .text(Math.round(percent) + '%');
            },
            });
        });
        </script>
        <!-- //pie-chart -->
        <!-- index page sales reviews visitors pie chart -->
        <!-- requried-jsfiles-for owl -->
        <link href="{{asset('backend/css/owl.carousel.css')}}" rel="stylesheet" />
        <script src="{{asset('backend/js/owl.carousel.js')}}"></script>
        <script>
        $(document).ready(function () {
            $('#owl-demo').owlCarousel({
            items: 3,
            lazyLoad: true,
            autoPlay: true,
            pagination: true,
            nav: true,
            });
        });
        </script>
        <!-- //requried-jsfiles-for owl -->
    </head>

    <body class="cbp-spmenu-push" style="background: url({{"../public/imgs/HInh2.jpg"}});">
        @if(Auth::check())
                <div class="main-content">
                <div
                    class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"
                    id="cbp-spmenu-s1"
                >
                    <!--left-fixed -navigation-->
                    <aside class="sidebar-left">
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                        <button
                            type="button"
                            class="navbar-toggle collapsed"
                            data-toggle="collapse"
                            data-target=".collapse"
                            aria-expanded="false"
                        >
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1>
                            <a class="navbar" href="{{url('/home')}}"
                            ><img src="{{ asset("imgs/MOVIE.png") }}" alt="" style="left: 0px"></a
                            >
                        </h1>
                        </div>
                        <div
                        class="collapse navbar-collapse"
                        id="bs-example-navbar-collapse-1"
                        >
                        <ul class="sidebar-menu">
                            <li class="header">MAIN NAVIGATION</li>
                            <li class="treeview">
                            <a href="{{url('/home')}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                            </li>
                            @php
                                $segment = Request::segment(1);
                            @endphp
                            <li class="treeview {{($segment == 'category') ? 'active' : ''}}">
                            <a href="#">
                                <i class="fa fa-file"></i>
                                <span>Danh mục phim</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                <a href="{{route('category.create')}}"
                                    ><i class="fa fa-angle-right"></i>Thêm danh mục</a
                                >
                                </li>
                                <li>
                                <a href="{{route('category.index')}}"
                                    ><i class="fa fa-angle-right"></i> Liệt kê danh mục</a
                                >
                                </li>
                            </ul>
                            </li>
                            <li class="treeview {{($segment == 'genre') ? 'active' : ''}}">
                                <a href="#">
                                    <i class="fa fa-child"></i>
                                    <span>Thể loại phim</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                    <a href="{{route('genre.create')}}"
                                        ><i class="fa fa-angle-right"></i>Thêm thể loại</a
                                    >
                                    </li>
                                    <li>
                                    <a href="{{route('genre.index')}}"
                                        ><i class="fa fa-angle-right"></i> Liệt kê thể loại</a
                                    >
                                    </li>
                                </ul>
                                </li>
                                <li class="treeview {{($segment == 'country') ? 'active' : ''}}">
                                    <a href="#">
                                        <i class="fa fa-globe"></i>
                                        <span>Quốc gia</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                        <a href="{{route('country.create')}}"
                                            ><i class="fa fa-angle-right"></i>Thêm quốc gia</a
                                        >
                                        </li>
                                        <li>
                                        <a href="{{route('country.index')}}"
                                            ><i class="fa fa-angle-right"></i> Liệt kê quốc gia</a
                                        >
                                        </li>
                                    </ul>
                                    </li>
                                    <li class="treeview {{($segment == 'movie') ? 'active' : ''}}">
                                        <a href="#">
                                            <i class="fa fa-film"></i>
                                            <span>Phim</span>
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li>
                                            <a href="{{route('movie.create')}}"
                                                ><i class="fa fa-angle-right"></i>Thêm phim</a
                                            >
                                            </li>
                                            <li>
                                            <a href="{{route('movie.index')}}"
                                                ><i class="fa fa-angle-right"></i> Liệt kê phim</a
                                            >
                                            </li>
                                        </ul>
                                        </li>
                                        <li class="treeview {{($segment == 'episode') ? 'active' : ''}}">
                                            <a href="#">
                                                <i class="fa fa-laptop"></i>
                                                <span>Tập phim</span>
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </a>
                                            <ul class="treeview-menu">
                                                <li>
                                                <a href="{{route('episode.create')}}"
                                                    ><i class="fa fa-angle-right"></i>Thêm tập phim</a
                                                >
                                                </li>
                                                <li>
                                                <a href="{{route('episode.index')}}"
                                                    ><i class="fa fa-angle-right"></i> Liệt kê tập phim</a
                                                >
                                                </li>
                                            </ul>
                                            </li>
                        </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                    </aside>
                </div>
                <!--left-fixed -navigation-->
                <!-- header-starts -->
                <div class="sticky-header ">
                    <div class="header-left">
                    <!--toggle button start-->
                    <!--toggle button end-->
                    <div class="profile_details_left">
                        <div class="clearfix"></div>
                    </div>
                    <!--notification menu end -->
                    <div class="clearfix"></div>
                    </div>
                    <div class="header-right">
                    <!--search-box-->
                    <div class="search-box">
                        <form class="input">
                        <input
                            class="sb-search-input input__field--madoka"
                            placeholder="Search..."
                            type="search"
                            id="input-31"
                            style="border-radius: 10px"
                        />

                        <label class="input__label" for="input-31">
                            <svg
                            class="graphic"
                            width="100%"
                            height="100%"
                            viewBox="0 0 404 77"
                            preserveAspectRatio="none"
                            >
                            <path d="m0,0l404,0l0,77l-404,0l0,-77z" />
                            </svg>
                        </label>
                        </form>
                    </div>
                    <!--//end-search-box-->
                    <div class="profile_details">
                        <ul>
                        <li class="dropdown profile_details_drop">
                            <a
                            href="#"
                            class="dropdown-toggle"
                            data-toggle="dropdown"
                            aria-expanded="false"
                            >
                            <div class="profile_img">
                                <span class="prfil-img"
                                ><img src="images/2.jpg" alt="" />
                                </span>
                                <div class="user-name">
                                <p>{{ Auth::user()->name }}</p>
                                <span style="color: #fff">Adminstator</span>
                                </div>
                                <i class="fa fa-angle-down lnr"></i>
                                <i class="fa fa-angle-up lnr"></i>
                                <div class="clearfix"></div>
                            </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                            {{-- <li>
                                <a href="#"><i class="fa fa-cog"></i> Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user"></i> My Account</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-suitcase"></i> Profile</a>
                            </li> --}}
                            <li>
                                {{-- <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a> --}}
                                <form  action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <i class="fa fa-sign-out"></i>
                                    <input type="submit" class="btn btn-danger btn-sm" value="Logout">
                                </form>
                            </li>
                            </ul>
                        </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- //header-ends -->
                <!-- main content start-->
                <div id="page-wrapper" style="background: url({{"../public/imgs/HInh2.jpg"}});">
                    <div class="main-page">
                    <div class="col_3">
                        <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-file icon-rounded"></i>
                            <div class="stats">
                            <h5><strong>{{$category_total}}</strong></h5>
                            <span>Danh mục</span>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-child user1 icon-rounded"></i>
                            <div class="stats">
                            <h5><strong>{{$genre_total}}</strong></h5>
                            <span>Thể loại</span>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-globe user2 icon-rounded"></i>
                            <div class="stats">
                            <h5><strong>{{$country_total}}</strong></h5>
                            <span>Quốc gia</span>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-film dollar1 icon-rounded"></i>
                            <div class="stats">
                            <h5><strong>{{$movie_total}}</strong></h5>
                            <span>Phim</span>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3 widget">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-laptop dollar2 icon-rounded"></i>
                            <div class="stats">
                            <h5><strong>{{$episode_total}}</strong></h5>
                            <span>Tập phim</span>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                    <!-- for amcharts js -->
                    <script src="{{asset('backend/js/amcharts.js')}}"></script>
                    <script src="{{asset('backend/js/serial.js')}}"></script>
                    <script src="{{asset('backend/js/export.min.js')}}"></script>
                    <link
                        rel="stylesheet"
                        href="{{asset('backend/css/export.css')}}"
                        type="text/css"
                        media="all"
                    />
                    <script src="{{asset('backend/js/light.js')}}"></script>
                    <!-- for amcharts js -->
                    <script src="{{asset('backend/js/index1.js')}}"></script>
                    <div class="col-md-5" style="witdh: 100%">
                        @yield('content')
                    </div>
                    </div>
                </div>
                <!--footer-->
                <!--//footer-->
                <!-- new added graphs chart js-->
            </div>
        </div>
       
    @else
        @yield('content_login')
        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endif
        <script src="{{asset('backend/js/Chart.bundle.js')}}"></script>
        <script src="{{asset('backend/js/utils.js')}}"></script>
        <!-- new added graphs chart js-->
        <!-- Classie -->
        <!-- for toggle left push menu script -->
        <script src="{{asset('backend/js/classie.js')}}"></script>
        <!-- //Classie -->
        <!-- //for toggle left push menu script -->
        <!--scrolling js-->
        <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
        <!--//scrolling js-->
        <!-- side nav js -->
        <script src="{{asset('backend/js/SidebarNav.min.js')}}" type="text/javascript"></script>
        <script>
        $('.sidebar-menu').SidebarNav();
        </script>
        <!-- //side nav js -->
        <!-- for index page weekly sales java script -->
        <script src="{{asset('backend/js/SimpleChart.js')}}"></script>
        <!-- //for index page weekly sales java script -->
        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('backend/js/bootstrap.js')}}"></script>
        <!-- //Bootstrap Core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#phim').DataTable();
                $('#quocgia').DataTable();
                $('#tapphim').DataTable();
            });
            function ChangeToSlug()
                {
        
                    var slug;
                    //Lấy text từ thẻ input title 
                    slug = document.getElementById("slug").value;
                    slug = slug.toLowerCase();
                    //Đổi ký tự có dấu thành không dấu
                        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                        slug = slug.replace(/đ/gi, 'd');
                        //Xóa các ký tự đặt biệt
                        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                        //Đổi khoảng trắng thành ký tự gạch ngang
                        slug = slug.replace(/ /gi, "-");
                        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                        slug = slug.replace(/\-\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-/gi, '-');
                        //Xóa các ký tự gạch ngang ở đầu và cuối
                        slug = '@' + slug + '@';
                        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                        //In slug ra textbox có id “slug”
                    document.getElementById('convert_slug').value = slug;
                }
        
            </script>
            <script type="text/javascript">
                $('.select-movie').change(function(){
                    var id = $(this).val();
                    $.ajax({
                        url:"{{route('select-movie')}}",
                        method:"GET",
                        data:{id:id},
                        success: function(data){
                            $('#episode').html(data);
                        }
                    })
                })
            </script>
    </body>
    </html>
