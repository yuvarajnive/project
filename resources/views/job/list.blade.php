@extends('layouts.app')

@section('content') 

<!-- Header start --> 

@include('includes.header') 

<!-- Header end --> 

<!-- Inner Page Title start --> 

@include('includes.inner_page_title', ['page_title'=>__('Job Listing')]) 


@include('flash::message')

@include('includes.inner_top_search')

<!-- Inner Page Title end -->

<div class="listpgWraper">

    <div class="container-fluid">
        <form action="{{route('job.list')}}" method="get">

            <!-- Search Result and sidebar start -->

            <div class="row"> 
            
                <div class="col-lg-8 col-sm-12"> 

                    <!-- Search List -->

                    <ul class="searchList">

                        <!-- job start --> 

                        @if(isset($jobs) && count($jobs)) <?php $count_1 = 1; ?> @foreach($jobs as $job) @php $company =

                            $job->getCompany();  @endphp

                             <?php if(isset($company))
                            {
                            ?>

                            <?php if($count_1 == 7) {?>

                                <li class="inpostad">{!! $siteSetting->listing_page_horizontal_ad !!}</li>

                            <?php }else{ ?>

                        <li>

                            <div class="row">

                                <div class="col-md-10 col-sm-10">

                                    <div class="jobimg">{{$company->printCompanyImage()}}</div>

                                    <div class="jobinfo">
                                        <h4>{{$company->name}}</h4>
                                        <div class="companyName">{{$job->title}}</div>
                                        <div class="location">

                                            <!-- <label class="" title="{{$job->getJobType('job_type')}}">{{$job->getJobType('job_type')}}</label> -->
                                            <span>{{$job->getJobType('job_type')}}</span>
                                            <span>{{$job->getCity('city')}}</span>
                                             <span>Published 3 hours ago</span>
                                        </div>
                                            
                                    </div>
                                    <!-- <p>{{\Illuminate\Support\Str::limit(strip_tags($job->description), 150, '...')}}</p> -->
                                    <div class="clearfix"></div>

                                </div>
                                
                            </div>

                        </li>

						 <?php } ?>

                            <?php $count_1++; ?>

						

						 <?php } ?>

                        <!-- job end --> 

                        @endforeach @endif

                            <!-- job end -->

                    </ul>
                    <!-- Pagination Start -->

                    <div class="pagiWrap">

                        <div class="row">

                            <div class="col-md-5">

                                <div class="showreslt">

                                    {{__('Showing Pages')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} {{__('Total')}} {{ $jobs->total() }}

                                </div>

                            </div>

                            <div class="col-md-7 text-right">

                                @if(isset($jobs) && count($jobs))

                                {{ $jobs->appends(request()->query())->links() }}

                                @endif

                            </div>

                        </div>

                    </div>

                    <!-- Pagination end --> 

                </div>
                <div class="col-lg-4 col-sm-12">
                    <h4>Google Ads</h4>
                <img alt="test" title="Google Adsense" class="EventCard__cover__3bzUV rounded" src="https://d1guu6n8gz71j.cloudfront.net/system/post/previews/6507683/big.jpeg?1667488477">       
                </div>

            </div>

        </form>

    </div>

</div>

<div class="modal fade" id="show_alert" role="dialog">

    <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content">

            <form id="submit_alert">

                @csrf

                <input type="hidden" name="search" value="{{ Request::get('search') }}">

                <input type="hidden" name="country_id" value="@if(isset(Request::get('country_id')[0])) {{ Request::get('country_id')[0] }} @endif">

                <input type="hidden" name="state_id" value="@if(isset(Request::get('state_id')[0])){{ Request::get('state_id')[0] }} @endif">

                <input type="hidden" name="city_id" value="@if(isset(Request::get('city_id')[0])){{ Request::get('city_id')[0] }} @endif">

                <input type="hidden" name="functional_area_id" value="@if(isset(Request::get('functional_area_id')[0])){{ Request::get('functional_area_id')[0] }} @endif">

                <div class="modal-header">

                    <h4 class="modal-title">Job Alert</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

					

					<h3>Get the latest <strong>{{ ucfirst(Request::get('search')) }}</strong> jobs  @if(Request::get('location')!='') in <strong>{{ ucfirst(Request::get('location')) }}</strong>@endif sent straight to your inbox</h3>

					

                    <div class="form-group">

                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email"

                            value="@if( Auth::check() ) {{Auth::user()->email}} @endif">

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>



    </div>

</div>

@include('includes.footer')

@endsection

@push('styles')

<style type="text/css">

    .searchList li .jobimg {

        min-height: 80px;

    }

    .hide_vm_ul{

        height:100px;

        overflow:hidden;

    }

    .hide_vm{

        display:none !important;

    }

    .view_more{

        cursor:pointer;

    }

    .EventCard__cover__3bzUV {
        width: 100%;
        /* height: 100%; */
    }

</style>

@endpush

@push('scripts') 

<script>
$('.btn-job-alert').on('click', function() {
    @if(Auth::user())
    $('#show_alert').modal('show');
    @else
    swal({
        title: "Save Job Alerts",

        text: "To save Job Alerts you must be Registered and Logged in",

        icon: "error",

        buttons: {
        Login: "Login",
        register: "Register",
        hello: "OK",
      },
});
    @endif

})

     $(document).ready(function ($) {
        $("#search-job-list").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });



        $("#search-job-list").find(":input").prop("disabled", false);



        $(".view_more_ul").each(function () {

            if ($(this).height() > 100)

            {

                $(this).addClass('hide_vm_ul');

                $(this).next().removeClass('hide_vm');

            }

        });

        $('.view_more').on('click', function (e) {

            e.preventDefault();

            $(this).prev().removeClass('hide_vm_ul');

            $(this).addClass('hide_vm');

        });



    });

    if ($("#submit_alert").length > 0) {

    $("#submit_alert").validate({



        rules: {

            email: {

                required: true,

                maxlength: 5000,

                email: true

            }

        },

        messages: {

            email: {

                required: "Email is required",

            }



        },

        submitHandler: function(form) {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $.ajax({

                url: "{{route('subscribe.alert')}}",

                type: "GET",

                data: $('#submit_alert').serialize(),

                success: function(response) {

                    $("#submit_alert").trigger("reset");

                    $('#show_alert').modal('hide');

                    swal({

                        title: "Success",

                        text: response["msg"],

                        icon: "success",

                        button: "OK",

                    });

                }

            });

        }

    })

}

 $(document).on('click','.swal-button--Login',function(){
        window.location.href = "{{route('login')}}";
     })
     $(document).on('click','.swal-button--register',function(){
        window.location.href = "{{route('register')}}";
     })

</script>

@include('includes.country_state_city_js')

@endpush