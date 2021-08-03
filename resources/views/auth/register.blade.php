@extends('layouts.regislog')

@section('regislog')    
<div class="regislog" >
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="mb-4 text-center">
            <img src="{{asset('images/login-images/registrasi.svg')}}"  width="360" alt="" class="regislog-img"/>
        </div>
        <div class="card-body p-5">
            <div><h1 class="regislog-title">Welcome!</h1></div>
            <div class="card-body">

                <div class="login-separater text-center mb-4"> 
                    <hr/>
                </div>
            
            <div class="form-body">
            <form class="row g-3" method="POST" action="{{ route('register') }}">
            @csrf
                <div class="col-12">
                    <label for="inputFirstName" class="form-label regislog-text">Nama Lengkap</label>
                        <input id="name" type="text" class="form-control regislog-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                 <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                        <input id="email" type="email"class="form-control regislog-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control regislog-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                <div class="col-12">
                    <label for="inputPassword" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control regislog-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary px-5 regislog-button">REGISTER</button>
                    </div>
                </div>
                            
                                
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
    </div>
    </div>
</div>
@endsection
