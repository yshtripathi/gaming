@extends('frontend.layouts.main')
@section('title', 'Instructors')
@section('main-content')
 <main class="rbt-main-wrapper">
         <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--60 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Our Instructors</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Our Instructors</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

      <!-- End Event Area  -->
      <div class="rbt-team-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row mb--60">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle bg-primary-opacity">Our Teacher</span>
                        <h2 class="title">Whose Inspirations You</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">

                <div class="col-lg-7">
                    <!-- Start Tab Content  -->
                    <div class="rbt-team-tab-content tab-content" id="myTabContent">
                         @foreach($instructor_data as $instructor)
                        
                        <div class="tab-pane fade @if($loop->index==0) active show @endif " id="team-tab{{ $loop->index+1}}" role="tabpanel" aria-labelledby="team-tab{{ $loop->index+1}}-tab">
                            <div class="inner">
                                <div class="rbt-team-thumbnail">
                                    <div class="thumb">
        <a href="{{ route('instructor.details', $instructor->instructor_slug) }}">
                                        <img src="{{$instructor->instructor_pic}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="rbt-team-details">
                                    <div class="author-info">
                <a href="{{ route('instructor.details', $instructor->instructor_slug) }}"><h4 class="title">{{$instructor->instructor_name}}</h4></a>
        <span class="designation theme-gradient">{{$instructor->instructor_designation}}</span>
                                        <span class="team-form">
                            <i class="feather-map-pin"></i>
                            <span class="location">CO Miego, AD,USA</span>
                                        </span>
                                    </div>
                                    
                                   
                                    <ul class="social-icon social-default mt--20 justify-content-start">
                                        <li><a href="https://www.facebook.com/">
                                                <i class="feather-facebook"></i>
                                            </a>
                                        </li>
                                        <li><a href="https://www.twitter.com/">
                                                <i class="feather-twitter"></i>
                                            </a>
                                        </li>
                                        <li><a href="https://www.instagram.com/">
                                                <i class="feather-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="rbt-information-list mt--25">
                                        <li>
                                            <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                        </li>
                                        <li>
                                            <a href="mailto:info@nh-gtrans.com"><i class="feather-mail"></i>info@nh-gtrans.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
@endforeach
                        
                        <div class="top-circle-shape"></div>
                    </div>
                    <!-- End Tab Content  -->
                </div>

                <div class="col-lg-5">
                    <!-- Start Tab Nav  -->
                    <ul class="rbt-team-tab-thumb nav nav-tabs" id="myTab" role="tablist">
                         @foreach($instructor_data as $instructor)
                        <li>
                            <a class="@if($loop->index==0) active @endif" id="team-tab{{ $loop->index+1}}-tab" data-bs-toggle="tab" data-bs-target="#team-tab{{ $loop->index+1}}" role="tab" aria-controls="team-tab{{ $loop->index+1}}" aria-selected="true">
                                <div class="rbt-team-thumbnail">
                                    <div class="thumb">
                                        <img src="{{$instructor->instructor_pic}}">
                                    </div>
                                </div>
                            </a>
                        </li>
@endforeach
                      
                    </ul>
                    <!-- End Tab Content  -->
                </div>
            </div>
        </div>
    </div>

    </main>


@endsection