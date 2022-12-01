@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Job Detail')]) 
<!-- Inner Page Title end -->
@include('flash::message')


@php
$company = $job->getCompany();
@endphp


<div class="listpgWraper">
    <div class="container"> 
        @include('flash::message')
       

        <!-- Job Detail start -->
        <div class="row">
            <div class="col-lg-7"> 
				
				 <!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
               
                        <h2>{{$job->title}} - {{$company->name}}</h2>
                        <div class="ptext">{{__('Date Posted')}}: {{$job->created_at->format('M d, Y')}}</div>
						
						@if(!Auth::user() && !Auth::guard('company')->user())
                        <a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{__('Login to View Salary')}} </a>
						@else
						@if(!(bool)$job->hide_salary)
                        <div class="salary">{{$job->getSalaryPeriod('salary_period')}}: <strong>{{$job->salary_from.' '.$job->salary_currency}} - {{$job->salary_to.' '.$job->salary_currency}}</strong></div>
                        @endif
						@endif
                    
            </div>
  
			<!-- Job Detail start -->
                <div class="jobmainreq">
                    <div class="jobdetail">
                       <h3><i class="fa fa-align-left" aria-hidden="true"></i> {{__('Job Detail')}}</h3>
						
							
							 <ul class="jbdetail">
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Location')}}:</div>
                                <div class="col-md-8 col-xs-7">
                                    @if((bool)$job->is_freelance)
                                    <span>Freelance</span>
                                    @else
                                    <span>{{$job->getLocation()}}</span>
                                    @endif
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Company')}}:</div>
                                <div class="col-md-8 col-xs-7"><a href="{{route('company.detail', $company->id)}}">{{$company->name}}</a></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Type')}}:</div>
                                <div class="col-md-8 col-xs-7"><span class="permanent">{{$job->getJobType('job_type')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Shift')}}:</div>
                                <div class="col-md-8 col-xs-7"><span class="freelance">{{$job->getJobShift('job_shift')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Career Level')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job->getCareerLevel('career_level')}}</span></div>
                            </li>
								<li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Positions')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job->num_of_positions}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Experience')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job->getJobExperience('job_experience')}}</span></div>
                            </li>
                            
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Degree')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job->getDegreeLevel('degree_level')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-xs-5">{{__('Apply Before')}}:</div>
                                <div class="col-md-8 col-xs-7"><span>{{$job->expiry_date->format('M d, Y')}}</span></div>
                            </li> 
                            
                        </ul>
							
							
                       
                    </div>
                </div>
			
			<hr>
            
        </div>
				
				
				
                <!-- Job Description start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{__('Job Description')}}</h3>
                        <p>{!! $job->description !!}</p>                       
                    </div>
                </div>
				
								

				
				
                <!-- Job Description end --> 

                
            </div>
            <!-- related jobs end -->

            <div class="col-lg-5"> 
				<div class="jobButtons applybox">
				@if($job->isJobExpired())
                <span class="jbexpire"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Job is expired')}}</span>
                @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                <a href="javascript:;" class="btn apply applied"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Already Applied')}}</a>
                @else
                <!-- <a href="{{route('apply.job', $job->slug)}}" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Apply Now')}}</a> -->
                <!-- <button type="button" class="btn btn-primary apply" data-toggle="modal" data-target="#myModal"> {{__('Apply Now')}}</button> -->
                <a href="{{route('apply.job', $job->slug)}}" class="btn apply" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Apply Now')}}</a>
                @endif
				</div>
            </div>
        </div>
        
		<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="row">
                            <div class="userccount">
                                <div class="formpanel"> {!! Form::open(array('method' => 'post', 'route' => ['post.apply.job', $job_slug])) !!} 
                                    <!-- Job Information -->
                                    <h5>{{$job->title}}</h5>
                                        <div class="col-md-12">
                                            <div class="formrow{{ $errors->has('cv_id') ? ' has-error' : '' }}"> {!! Form::select('cv_id', [''=>__('Select CV')]+$myCvs, null, array('class'=>'form-control', 'id'=>'cv_id')) !!}
                                                @if ($errors->has('cv_id')) <span class="help-block"> <strong>{{ $errors->first('cv_id') }}</strong> </span> @endif </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="formrow{{ $errors->has('current_salary') ? ' has-error' : '' }}"> {!! Form::number('current_salary', null, array('class'=>'form-control', 'id'=>'current_salary', 'placeholder'=>__('Current salary').' ('.$job->getSalaryPeriod('salary_period').')' )) !!}
                                                @if ($errors->has('current_salary')) <span class="help-block"> <strong>{{ $errors->first('current_salary') }}</strong> </span> @endif </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="formrow{{ $errors->has('expected_salary') ? ' has-error' : '' }}"> {!! Form::number('expected_salary', null, array('class'=>'form-control', 'id'=>'expected_salary', 'placeholder'=>__('Expected salary').' ('.$job->getSalaryPeriod('salary_period').')')) !!}
                                                @if ($errors->has('expected_salary')) <span class="help-block"> <strong>{{ $errors->first('expected_salary') }}</strong> </span> @endif </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="formrow{{ $errors->has('salary_currency') ? ' has-error' : '' }}"> {!! Form::text('salary_currency', Request::get('salary_currency', $siteSetting->default_currency_code), array('class'=>'form-control', 'id'=>'salary_currency', 'placeholder'=>__('Salary Currency'), 'autocomplete'=>'off')) !!}
                                                @if ($errors->has('salary_currency')) <span class="help-block"> <strong>{{ $errors->first('salary_currency') }}</strong> </span> @endif </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="formrow{{ $errors->has('salary_currency') ? ' has-error' : '' }}"> {!! Form::textarea('job_cover_letter', null, array('class'=>'form-control', 'id'=>'cover_letter', 'placeholder'=>__('Cover Letter'), 'autocomplete'=>'off')) !!}
                                                <!-- @if ($errors->has('salary_currency')) <span class="help-block"> <strong>{{ $errors->first('salary_currency') }}</strong> </span> @endif </div> -->
                                        </div>
                                    <br>
                                    <input type="submit" class="btn" value="{{__('Apply on Job')}}">
                                    {!! Form::close() !!} </div>
                            </div>
                        </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .view_more{display:none !important;}
</style>
@endpush
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).css('height', 100);
                $(this).css('overflow', 'hidden');
                //alert($( this ).next());
                $(this).next().removeClass('view_more');
            }
        });
        $('#salary_currency').typeahead({
            source: function (query, process) {
                return $.get("{{ route('typeahead.currency_codes') }}", {query: query}, function (data) {
                    console.log(data);
                    data = $.parseJSON(data);
                    return process(data);
                });
            }
        });
    });
</script> 
@endpush