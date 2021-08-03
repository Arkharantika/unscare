@extends('layouts.regislog')

@section('regislog')
<!--wrapper-->
<div class="regislog">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="mb-4 text-center">
            <img src="{{asset('images/login-images/login.svg')}}" width="360" alt="" class="regislog-img"/>
        </div>
        <div class="card-body p-5">
            <div><h1 class="regislog-title">Welcome Back!<h1></div>
                            <div class="card-body">

                                <div class="login-separater text-center mb-4"> 
                                    <hr/>
                                </div>

                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('login') }}">           
                                    @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label regislog-text">Email :</label>
                                            <input id="email" type="email" class="form-control regislog-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label regislog-text">Password :</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input id="password" type="password" class="form-control regislog-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-lg px-5 regislog-button">Masuk</button>
                                            </div>
                                        </div>

                                        <div class="col-12"> 
                                            <div class="d-grid">
                                                <a href="{{url('/register')}}" class="btn btn-primary btn-lg px-5 text-center regislog-button" >Daftar Baru</a>
                                            </div>
                                        </div>
                                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end wrapper-->

@endsection
