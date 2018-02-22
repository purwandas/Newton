@extends('layouts.applogin')

@section('content')
                    <form class="form-horizontal" style="margin:40% auto;" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="section-title">
                            <h3>LogIn to your Account</h3>
                        </div>
                        <div class="textbox-wrap {{ $errors->has('email') ? ' has-error' : '' }} focused">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="textbox-wrap {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="login-form-action clearfix">
                            
                                <div class="checkbox" style="margin-top: -15px;margin-left: 26px;">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>

                            <button type="submit" class="btn btn-success pull-right green-btn" style="margin-right: 15px;">
                                Log In
                            </button>
                            <a class="btn pull-right" href="{{ route('register') }}" style="    margin-top: 40px;margin-bottom: -17px;margin-right: -74px;">
                                Register?
                            </a>
                        </div>
                    </form>
@endsection