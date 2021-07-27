@extends('layouts.backend')

@section('data')
{{ $complete->nama_lengkap }}
@endsection

@section('status')
{{ $user->role }}
@endsection
 
@section('content')
<div class="container">

    <!--breadcrumb-->				
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<h6 class="mb-0 text-uppercase">DataTable Example</h6>
				<hr/>
            <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <!-- <img src="assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110"> -->
                                <div class="mt-3">
                                    <h4>{{ $complete->nama_lengkap }}</h4>
                                    <p class="text-secondary mb-1">{{ $complete->nim_nip}}</p>
                                    <p class="text-muted font-size-sm">{{ $complete->alamat}}</p>
                                    <button class="btn btn-primary">{{ $complete->status}}</button>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <ul class="list-group list-group-flush">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="/userdata/{{$user->id}}" enctype="multipart/form-data" >
                                @method('PATCH')
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ $complete->nama_lengkap }}" name="nama_lengkap" id="nama_lengkap">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">NIM / NIP</h6>                                        
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ $complete->nim_nip}}" name="nim_nip" id="nim_nip">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No. Telp</h6>                                        
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ $complete->no_telp}}" name="no_telp" id="no_telp">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>                                        
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea type="form-control" class="form-control" placeholder="{{ $complete->alamat}}" name="alamat" id="alamat"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Status</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="option" id="option" value="{{ $complete->status}}">                                        
                                            <option value="dokter">dokter</option>
                                            <option value="tenaga medis">tenaga medis</option>
                                            <option value="biasa">biasa</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Foto KTP</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" id="file_ktp" name="file_ktp" data-toggle="custom-file-input" multiple required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Simpan Perubahan" />
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
@endsection