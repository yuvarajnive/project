@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Company Posted Jobs')])
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .endrnavwrap{background: #37474F; border-radius: 5px; margin-bottom: 30px;}
.envnavdash {
	margin-bottom: 0;
	padding: 20px;
	
}
.envnavdash li a {
	border-bottom: 1px solid #455A64;;
	padding: 10px 15px;
	color: #CFD8DC;
	display: block;
}

.envnavdash li a:hover {
	color: #5e2dfa;
	text-decoration: none;
}
.envnavdash li i {
	margin-right: 2px;
	font-size: 18px;
	width: 20px;
	color: #999;
}
.envnavdash li.active a {
	color: #5e2dfa;
}
.envnavdash li.active a i, .envnavdash li a:hover i {
	color: #5e2dfa;
}
</style>
@endpush
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3 col-sm-4">
        <div class="endrnavwrap">
            <ul class="envnavdash">
                <li class="{{ Request::url() == route('company.home') ? 'active' : '' }}"><a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a></li>
                <li class="{{ Request::url() == route('company.profile') ? 'active' : '' }}"><a href="{{ route('company.profile') }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{__('Edit Profile')}}</a></li>
                <li><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Company Public Profile')}}</a></li>
                <li class="{{ Request::url() == route('post.job') ? 'active' : '' }}"><a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a></li>
                
                <li class="{{ Request::url() == route('company.packages') ? 'active' : '' }}"><a href="{{ route('company.packages') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('CV Search Packages')}}</a></li>
                
                <li class="{{ Request::url() == route('company.unloced-users') ? 'active' : '' }}"><a href="{{ route('company.unloced-users') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Unlocked Users')}}</a></li>

                <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
                    <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </li>
            </ul>
        </div>
</div>

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Company Posted Jobs')}}</h3>
         <div class="table-responsive">           
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Job Title</th>
            <th scope="col">Posted Date</th>
            <th scope="col">Skills</th>
            <th scope="col">Experience</th>
            <th scope="col">No of openings</th>
            <th scope="col"> Applied Candidates</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @if(isset($jobs) && count($jobs))
        {{$i=1}}
        @foreach($jobs as $job)
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$job->title}}</td>
            <td>{{$job->updated_at->format('d/m/Y')}}</td>
            <td>PHP, Javascript</td>
            <td>1 to 3 Years</td>
            <td>{{$job->num_of_positions}}</td>
            <td><a href="{{route('list.applied.users', [$job->id])}}">View</a></td>
            <td>
            <!-- <a href="{{route('edit.front.job', [$job->id])}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
            </a> -->
            <a href="{{route('edit.front.job', [$job->id])}}">
              <button type="button" class="btn btn-success"><i class="fa fa-edit fa-2xs" aria-hidden="true"></i></button>
            </a>
              <button type="button" class="btn btn-danger"><i class="fa fa-trash fa-2xs" aria-hidden="true"></i></button>
            </td>
          </tr>
          {{$i++}}
        @endforeach
        @endif
        </tbody>
      </table>
</div>
					
					
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
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
@push('scripts')
<script type="text/javascript">
    function deleteJob(id) {
    var msg = 'Are you sure?';
    if (confirm(msg)) {
    $.post("{{ route('delete.front.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            if (response == 'ok')
            {
            $('#job_li_' + id).remove();
            } else
            {
            alert('Request Failed!');
            }
            });
    }
    }
</script>
@endpush