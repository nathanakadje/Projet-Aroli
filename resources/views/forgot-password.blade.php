{{-- @extends('Layout.app')

@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('/FrontEnd/images/bg-01.jpg');">
        <div class="wrap-login100">
            @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
            <form class="login100-form validate-form" action="{{ route('password.email') }}" method="POST">
            @csrf
                <span class="login100-form-title p-b-34 p-t-27">
                   Reset password
                </span>
               
                <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                    <input class="input100" type="text" name="email" placeholder="Email" required>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit">Envoyer le lien de réinitialisation</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>
@endsection --}}
@extends('Layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">Mot de passe oublié</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Envoyer le lien de réinitialisation
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
