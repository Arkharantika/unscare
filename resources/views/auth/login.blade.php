@extends('layouts.app')

@section('content')
<!--wrapper-->
<div class="container">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="{{asset('images/uns-biru.png')}}" width="360" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-header text-center"><h1><h1></div>
                            <div class="card-body">

                                <div class="text-center"><i class="bx bxs-user-circle text-primary font-50"></i><h4 class="form-label ">Masuk </h4>
                                </div>

                                <div class="login-separater text-center mb-4"> 
                                    <hr/>
                                </div>

                                <div class="form-body">
                                    <form class="row g-3" method="POST" action="{{ route('login') }}">           
                                    @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email :</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password :</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-lg px-5">Masuk</button>
                                            </div>
                                        </div>

                                        <div class="col-12"> 
                                            <div class="d-grid">
                                                <a href="{{url('/register')}}" class="btn btn-primary btn-lg px-5 text-center" >Daftar Baru</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end wrapper-->

@endsection
