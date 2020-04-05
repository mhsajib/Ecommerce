@extends('layouts.app')

@section('content')
<!-- Default form register -->
<form method="POST" class="text-center border border-light p-5" action="{{ route('register') }}"  style="width:35%; border:1px solid #ccc !important; margin-left:450px; margin-bottom:100px;">
 @csrf
    <p class="h4 mb-4">Sign up</p>

    <input type="text" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Fullname" name="name" required>


    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} "  placeholder="E-mail"  required>

    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" name="password" class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>

    <input type="password" id="defaultRegisterFormEmail" name="password_confirmation" class="form-control mb-4" placeholder="Confirm Password" required>



    <!-- Phone number -->
    <input type="text" id="defaultRegisterPhonePassword"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" aria-describedby="defaultRegisterFormPhoneHelpBlock" placeholder="Phone Number"  required>



    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

    <!-- Social register -->
    <p>or sign up with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>

</form>
<!-- Default form register -->
@endsection
