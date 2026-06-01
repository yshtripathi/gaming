@extends('frontend.layouts.master')

@section('title', 'Instructor Details')

@section('main-content')

<main>
      <!-- hero-area-start -->
      <div class="hero-arera course-item-height" data-background="{{ asset('assets/img/slider/course-slider.jpg') }}" style="background-image: url(&quot;assets/img/slider/course-slider.jpg&quot;);">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="hero-course-1-text">
                     <h2>{{ __('common.instructors') }}</h2>
                  </div>
                  <div class="course-title-breadcrumb">
                     <nav>
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('common.home') }}</a></li>
                           <li class="breadcrumb-item"><span>{{ __('common.instructors') }}</span></li>
                           <li class="breadcrumb-item active" aria-current="page">{{ $instructor_data->instructor_name }}</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- hero-area-end -->

      <!-- course-detailes-area-start -->
      <div class="course-details-area pt-120 pb-100">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3">
                  <div class="course-instructors-img mb-30">
                     <img class="mb-20" src="https://www.cloud-bizinfo.com/assets/img/member/{{ $instructor_data->instructor_pic }}" alt="instructors-img">
                     <div class="course-details-tittle mb-30">
                        <h3>{{ $instructor_data->instructor_name }}</h3>
                        <span class="d-block mb-15">{{ $instructor_data->instructor_designation }}</span>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-9">
                  <div class="course-details-wrapper">
                     <div class="course-bio-text pt-45 pb-20">
                        <p>{!! $instructor_data->instructor_desc !!}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- course-detailes-area- end -->

   </main>


@endsection
