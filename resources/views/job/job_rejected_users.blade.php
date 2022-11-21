@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Job Applications')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Rejected Users')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($job_applications) && count($job_applications))
                        @foreach($job_applications as $job_application)
                        @php
                        $user = $job_application->getUser();
                        $job = $job_application->getJob();
                        $company = $job->getCompany();             
                        $profileCv = $job_application->getProfileCv();
                        @endphp
                        @if(null !== $job_application && null !== $user && null !== $job && null !== $profileCv)
                        <li>
                            <div class="row">
                                <div class="col-md-5 col-sm-5">
                                    <div class="jobimg">{{$user->printUserImage(100, 100)}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('applicant.profile', $job_application->id)}}">{{$user->getName()}}</a></h3>
                                        <div class="location"> {{$user->getLocation()}}</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                               
                                <div class="col-md-3 col-sm-3">
                                    <div class="listbtn"><a href="{{route('user.profile', $user->id)}}">{{__('View Profile')}}</a></div>
                                </div>
                            </div>
                            <p>{{\Illuminate\Support\Str::limit($user->getProfileSummary('summary'),150,'...')}}</p>
                        </li>
                        <!-- job end --> 
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection