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
<!--end breadcrumb-->

<div class="row row-cols-1 row-cols-xl-2">
    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">

            <div class="text-center"><i class="bx bx-disc text-dark font-50"></i><h4 class="form-label ">Lapor Bergejala Covid</h4>

            </div>
            <div class="login-separater text-center mb-4"> 
                <hr/>
            </div>

            <form method="post" action="/user/claimcovid" enctype="multipart/form-data" >
            @csrf
                <div class="mb-3">
                    <label class="form-label">Gejala Yang Dirasakan :</label>
                    <textarea type="form-control" class="form-control" placeholder="" name="keterangan" id="keterangan"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat lengkap Kos/Asrama/Rumah sewa, disekitar UNS <br>(contoh, kos xx, jalan xx, gang xx, RT/RW, kelurahan, kecamatan, Surakarta) :</label>
                    <textarea type="form-control" class="form-control" placeholder="" name="keterangan" id="keterangan"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">URL tempat tinggal saat ini (koordinat G-Map) :</label>
                    <textarea type="form-control" class="form-control" placeholder="" name="keterangan" id="keterangan"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Tempat Tinggal :</label>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="option" id="option" value="{{ $complete->status}}">                                        
                        <option value="dokter">kos</option>
                        <option value="tenaga medis">rumah orang tua</option>
                        <option value="biasa">asrama</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Apakah ada orang lain yang tinggal bersama saya dalam satu bangunan tempat tinggal saya? :</label>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="option" id="option" value="{{ $complete->status}}">                                        
                        <option value="dokter">tidak</option>
                        <option value="tenaga medis">ya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Apakah saya memiliki kontak erat dengan penderita COVID-19? <br>(dalam kurun waktu 14 hari terakhir) :</label>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="option" id="option" value="{{ $complete->status}}">                                        
                        <option value="dokter">dokter</option>
                        <option value="tenaga medis">tenaga medis</option>
                        <option value="biasa">biasa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Link G-Drive TTD dan Nama Lengkap :</label>
                    <textarea type="form-control" class="form-control" placeholder="" name="keterangan" id="keterangan"></textarea>
                </div>
                
                <!-- <div class="mb-3">
                    <label class="form-label">Foto Hasil Test Positif Covid :</label>
                    <input type="file" class="form-control" id="file_hasil" name="file_hasil" data-toggle="custom-file-input" multiple>
                </div> -->
                <br><br><br>
                
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg px-5"><i class="bx bx-sun"></i>Saya Melapor !</button>
                    </div>
                </div>
                

            </form>
            </div>
    </div>
</div>

@endsection