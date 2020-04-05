@extends('layouts.app')

@section('content')
        {{-- <div class="wrapper without_header_sidebar">
            <!-- contnet wrapper -->
            <div class="content_wrapper">
                    <!-- page content -->
                    <div class="login_page center_container">
                        <div class="center_content">
                            <div class="logo">
                                <img src="{{asset('public/panel/assets/images/logo.png')}}" alt="" class="img-fluid">
                            </div>
                            <form action="{{route('login')}}" class="d-block" method="post">
                                @csrf
                                <div class="form-group icon_parent">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                                </div>
                                <div class="form-group icon_parent">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                                </div>
                                <div class="form-group">
                                    <label class="chech_container">Remember me
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a class="registration" href="{{route('register')}}">Create new account</a><br>
                                    <a href="{{ route('password.request') }}" class="text-white">I forgot my password</a>
                                    <button type="submit" class="btn btn-blue">Login</button>
                                </div>
                            </form>
                            <div class="footer">
                                <p>Copyright &copy; 2019 <a href="https://durbarit.com/">Durbar IT</a>. All rights reserved.</p>
                            </div>
                            
                        </div>
                    </div>
            </div><!--/ content wrapper -->
        </div><!--/ wrapper --> --}}

<!-- Default form login -->
    <form class="text-center border border-light p-5" action="{{ route('login') }}" style="width:35%; border:1px solid #ccc !important; margin-left:450px; margin-bottom:100px;" method="POST">
        @csrf

    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  placeholder="E-mail">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
   @enderror

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required placeholder="Password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="d-flex justify-content-around">


    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit" style="width:80%; margin:auto;">Sign in</button>


    <a href="{{ route('password.request') }}">Forgot Password</a><br><br>


    <!-- Social login -->
    <p> sign in with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

</form>
<!-- Default form login -->

@endsection
