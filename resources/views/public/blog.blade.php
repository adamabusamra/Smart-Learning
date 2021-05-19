@extends('layouts.public')

@section('title')
Home
@endsection

@section('main')

<!-- Blog Section Start -->
<div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 pr-50 md-pr-15">
        <div class="widget-area">

          <div class="recent-posts-widget mb-50">
            <h3 class="widget-title">Recent Posts</h3>
            @foreach($news as $post)
            <div class="show-featured ">
              <div class="post-img">
                <a href="/posts/{{$post->id}}"><img src="{{asset('news/images/'.$post->image)}}" alt=""></a>
              </div>
              <div class="post-desc">
                <a href="/posts/{{$post->id}}">{{$post->headline}}</a>
                <span class="date">
                  <i class="fa fa-calendar"></i>
                  {{$post->created_at}}
                </span>
              </div>
            </div>
            @endforeach
          </div>


        </div>
      </div>
      <div class="col-lg-8">
        <div class="row">
          @foreach ($news as $post)
          <div class="col-lg-12 mb-70">
            <div class="blog-item">
              <div class="blog-img">
                <a href="#"><img src="{{asset('news/images/'.$post->image)}}" alt="post image"></a>
              </div>
              <div class="blog-content">
                <h3 class="blog-title"><a href="/posts/{{$post->id}}">{{$post->headline}}</a></h3>
                <div class="blog-meta">
                  <ul class="btm-cate">
                    <li>
                      <div class="blog-date">
                        <i class="fa fa-calendar-check-o"></i> {{$post->created_at}}
                      </div>
                    </li>
                    <li>
                      <div class="author">
                        <i class="fa fa-user-o"></i> admin
                      </div>
                    </li>
                    <li>
                      <div class="tag-line">
                        <i class="fa fa-book"></i>
                        <a href="#">{{$post->tag}}</a>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="blog-desc">
                  {{$post->short_description}}
                </div>
                <div class="blog-button">
                  <a class="blog-btn" href="/posts/{{$post->id}}">Continue Reading</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog Section End -->
@endsection