@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Login')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
       
            <div class="useraccountwrap">
                <div class="userccount">
                    <div class="userbtns">
                        <ul class="nav nav-tabs">
                            <?php
                            $c_or_e = old('candidate_or_employer', 'candidate');
                            ?>
                            <li class="nav-item"><a class="nav-link {{($c_or_e == 'candidate')? 'active':'active'}}" data-toggle="tab" href="#candidate" aria-expanded="true">{{__('Candidate')}}</a></li>
                        </ul>
                    </div>
					
					
                    <div class="tab-content">
                        <div id="candidate" class="formpanel tab-pane {{($c_or_e == 'candidate')? 'active':'active'}}">
                            
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="candidate" />
                                <div class="formpanel">
                                    <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>            
                                    <input type="submit" class="btn" value="{{__('Login')}}">
                                </div>
                                <!-- login form  end--> 
                            </form>
                            <!-- sign up form -->
                            <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('New User')}}? <a href="{{route('register')}}">{{__('Register Here')}}</a></div>
                             <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('Forgot Your Password')}}? <a href="{{ route('password.request') }}">{{__('Click here')}}</a></div>
                    <!-- sign up form end-->
                        </div>
                    </div>
                    <!-- login form -->

                     

                </div>
            </div>
        
    </div>
</div>

@endsection
