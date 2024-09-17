@extends('layout')  
@section('content')


   <div class="row container" id="wrapper">
      <div class="halim-panel-filter">
         <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
         </div>
      </div>
      {{-- <div class="col-xs-12 carausel-sliderWidget">
         <section id="halim-advanced-widget-4">
            <div class="section-heading">
               <a href="danhmuc.php" title="Phim Chiếu Rạp">
               <span class="h-text">Phim Chiếu Rạp</span>
               </a>
               <ul class="heading-nav pull-right hidden-xs">
                  <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
               </ul>
            </div>
            <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
               <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('movie')}}" title="GÓA PHỤ ĐEN">
                        <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                        <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">GÓA PHỤ ĐEN</p>
                              <p class="original_title">Black Widow</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               
            </div>
         </section>
         <div class="clearfix"></div>
      </div> --}}
      <div id="halim_related_movies-2xx" class="wrap-slider">
         <div class="section-bar clearfix">
            <h3 class="section-title"><span>PHIM HOT</span></h3>
         </div>
         <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
            @foreach ($phimhot as $key => $hot)
            <article class="thumb grid-item post-38498">
               <div class="halim-item">
                  <a class="halim-thumb" href="{{route('movie', $hot->slug)}}" title="{{$hot->title}}">
                     <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="Đại Thánh Vô Song" title="{{$hot->title}}"></figure>
                     <span class="status">
                              @if($hot -> resolution == 1)
                                 SD
                              @elseif($hot -> resolution == 0)
                                 HD
                              @else
                                 Full HD
                              @endif
                        </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$hot->phude}}</span> 
                     <div class="icon_overlay"></div>
                     <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                           <p class="entry-title">{{$hot->title}}</p>
                           <p class="original_title"></p>
                        </div>
                     </div>
                  </a>
               </div>
            </article>
            @endforeach
         </div>
         <script>
            $(document).ready(function($) {				
            var owl = $('#halim_related_movies-2');
            owl.owlCarousel({loop: true,margin: 5,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa-solid fa-chevron-left"></i>', '<i class="fa-solid fa-chevron-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 6}}})});
         </script>
      </div>
      <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
         @foreach($category_home as $key => $cate_home)
         <section id="halim-advanced-widget-2">
            <div class="section-heading">
               <a href="danhmuc.php" title="Phim Bộ">
               <span class="h-text">{{$cate_home->title}}</span>
               </a>
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
               @foreach($cate_home->movie->take(12) as $key => $movie_home)
               <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('movie', $movie_home->slug)}}">
                        <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$movie_home->image)}}" alt="" title="{{$movie_home->title}}"></figure>
                        <span class="status">{{$movie_home->sotap}} TẬP</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$movie_home->phude}}</span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$movie_home->title}}</p>
                              <p class="original_title"></p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               @endforeach
            </div>
         </section>
         <div class="clearfix"></div>
         @endforeach
      </main>
      @include('Clients.include.sidebar')
   </div>
   @endsection