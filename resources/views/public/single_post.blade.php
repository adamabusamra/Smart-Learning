@extends('layouts.public')

@section('title')
Home
@endsection

@section('main')

<!-- Blog Section Start -->
<div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
  <div class="container">
    <div class="blog-deatails">
      <div class="bs-img">
        <a href="#"><img src="{{asset('news/images/'.$post->image)}}" alt=""></a>
      </div>
      <div class="blog-full">
        <ul class="single-post-meta">
          <li>
            <span class="p-date"> <i class="fa fa-calendar-check-o"></i> {{$post->created_at}} </span>
          </li>
          <li>
            <span class="p-date"> <i class="fa fa-user-o"></i> admin </span>
          </li>
          <li class="Post-cate">
            <div class="tag-line">
              <i class="fa fa-book"></i>
              <a href="#">{{$post->tag}}</a>
            </div>
          </li>
        </ul>
        <div class="blog-desc">
          <p>
            {!! $post->short_description!!}
          </p>
        </div>
        {!! $post->long_description!!}
      </div>
    </div>
  </div>
</div>
<!-- Blog Section End -->

@endsection