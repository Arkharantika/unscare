@extends('layouts.backend')

@section('data')
{{ $complete->nama_lengkap }}
@endsection

@section('status')
{{ $user->role }}
@endsection

@section('content')
<!--breadcrumb-->				
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="font 50">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item active" aria-current="page"><div class="btn btn-light ">Status saat ini </div></li>
            </ol>
        </nav>
    </div>&nbsp;&nbsp;

    @if(($data ?? '') == null)
    <div class="btn btn-primary "> Belum Ada </div>
    @endif
    @if(($data->sembuh ?? '') == 'belum')
    <div class="btn btn-danger "> Terinfeksi Covid 19 !!</div>
    @endif
    @if(($data->sembuh ?? '') == 'sudah')
    <div class="btn btn-success "> Sudah Sembuh ! </div>
    @endif

    &nbsp;&nbsp;

    @if(($vaksin ?? '') != null)
    <div class="btn btn-primary "> Sudah Vaksin ! </div>
    @endif
    @if(($vaksin ?? '') == null)
    <div class="btn btn-warning "> Belum Vaksin Covid !  </div>
    @endif



    <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
        </div>
    </div>
</div>

<h6 class="mb-0 text-uppercase">DataTable Example</h6>
<hr/>

<div class="row row-cols-1 row-cols-xl-2">
<div class="col d-flex">
    <div class="card radius-10 w-100">
        <div class="card-body">
            <div class="text-center"><i class="bx bx-capsule text-dark font-50"></i><h4 class="form-label ">Claim Vaksin Covid</h4>
            </div>
            <div class="login-separater text-center mb-4"> 
                <hr/>
            </div>

            <form method="post" action="/user/claimvaksin/{{$user->id}}" enctype="multipart/form-data" >
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Dosis ke :</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="1/2/3" name="dosis">
                    <datalist id="datalistOptions">
                        <option value="1">
                        <option value="2">
                        <option value="3">
                        <option value="4">
                        <option value="5">
                    </datalist>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan :</label>
                    <textarea type="form-control" class="form-control" placeholder="" name="keterangan" id="keterangan"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Link G-Drive Kartu Vaksin :</label>
                    <textarea type="form-control" class="form-control" placeholder="" name="link" id="link"></textarea>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg px-5"><i class="bx bx-message-square-check"></i>Saya Sudah Vaksin !</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@endsection