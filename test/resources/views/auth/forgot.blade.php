@extends('layout.layout')

@section('page')
    Forgot password
@endsection
@section('main-content')

    <div class="container-fluid h-custom">
        @include('include.messages')

        <div class="text-center" style="padding:50px 0">
            <div class="logo">forgot password</div>
            <!-- Main Form -->
            <div class="login-form-1">
                <form method="post" action="{{route('forgot_proc')}}">
                    @csrf
                    <div class="etc-login-form">
                        <p>When you fill in your registered email address, you will be sent instructions on how to reset
                            your password.</p>
                    </div>
                    <div class="main-login-form">
                        <div class="login-group">
                            <div class="form-group">
                                <label for="fp_email" class="sr-only">Email address</label>
                                <input type="email" class="form-control" id="fp_email" name="email"
                                       placeholder="email address">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-danger">Press</button>
                    </div>
                    <div class="etc-login-form">
                        <p>already have an account? <a href="{{route('login')}}">login here</a></p>
                        <p>new user? <a href="{{route('registration')}}">create new account</a></p>
                    </div>
                </form>
            </div>
            <!-- end:Main Form -->
        </div>
    </div>

@endsection
