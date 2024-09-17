<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Quan tâm nhiều nhất</span>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach($top as $key => $mov)
                    <div class="item post-37176">
                    <a href="{{route('movie', $mov->slug)}}" title="{{$mov->title}}">
                        <div class="item-link">
                            <img src="{{asset('uploads/movie/'.$mov->image)}}" class="lazy post-thumb" alt="" title="{{$mov->title}}" />
                            <span class="is_trailer">
                                @if($mov -> resolution == 1)
                                SD
                            @elseif($mov -> resolution == 0)
                                HD
                            @else
                                Full HD
                            @endif
                            </span>
                        </div>
                        <p class="title">{{$mov->title}}</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">{{$mov->director}}</div>
                    <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                        <span style="width: 0%"></span>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        </div>
    </aside>