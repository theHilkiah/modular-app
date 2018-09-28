@extends('layouts.base')

        @section('styles')
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 480px;
                max-width: 100%;
                box-shadow: 1px 1px 1rem 1px #cccc;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @endsection
        @section('content')
        <div class="flex-center position-ref full-height">
            {{--  @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Enroll</a>
                    @endauth
                </div>
            @endif  --}}

            <div class="content m-3" id="app">

                @if (auth()->check())
                    <div class="card">
                        <div class="card-body">
                            <div class="title m-b-md">
                                {{ config('app.name') }}
                            </div>

                            <div class="links">
                                <a href="/admin">ADMIN</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <div class="row">
                                <div class="col">
                                    <img src="{{config('app.logo')}}" style="max-height:50px" alt="">
                                </div>
                                <div class="col">
                                <h4 class="card-title my-0">LOGIN</h4>
                                <small>(Authorized users only)</small>
                            </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="enroll-user collapse">
                                        <enroll-user :_token="'{{csrf_token() }}'" :action="'{{ route('login') }}'" :domain="'{{config('mail.domain')}}'"></enroll-user>
                                        <hr class="row">
                                        <a class="btn btn-sm btn-outline-primary text-black" href="#" onclick="$('.enroll-user').hide();$('.login-user').slideDown();">
                                                Enrolled? Login Here
                                            </a>
                                </div>
                                <div class="login-user collapse show">
                                    <login-user :_token="'{{csrf_token() }}'" :action="'{{ route('login') }}'" :domain="'{{config('mail.domain')}}'"></login-user>
                                    <hr class="row">
                                    <a class="btn btn-sm btn-outline-primary text-black" href="#" onclick="$('.login-user').hide();$('.enroll-user').slideDown();">
                                            New or Guest Access?
                                        </a>
                                </div>
                            </div>
                        <div class="card-footer">
                            <a class="btn btn-link text-black" href="/auth/passwords/reset">
                                Forgot Your Password?
                            </a>

                        </div>
                    </div>
                @endif

            </div>
        </div>
        @endsection
