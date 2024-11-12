
@extends('Layout.app')

@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('/FrontEnd/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="/register/traitement" method="POST">
            @csrf
                <span class="login100-form-title p-b-34 p-t-27">
                    Register
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
                @if (session('status'))
                
                        <a href="#"  class="txt1 " >{{ session('status') }}</a>  
                
                 @endif

                <div class="text-center p-t-40">
                    <a class="txt1" href="/login">
                        Have an account
                    </a>
                </div>
            </form>         
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>
@endsection