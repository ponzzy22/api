@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Edit Anggota Honorer
                </div>
                <div class="card-body">
                    <form action="{{ url('honorer', $honorer->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $honorer->nama }}" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Email</label>
                            <input type="text" class="form-control" name="pegawai_email" value="{{ $honorer->pegawai_email }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="{{ $honorer->jabatan }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label">NIP</label>
                                <input type="number" class="form-control" name="nip" value="{{ $honorer->nip }}"> 
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Golongan</label>
                            <input type="text" class="form-control" name="gol" value="{{ $honorer->gol }}"> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label">Status</label>
                                <input type="text" class="form-control" name="status" value="{{ $honorer->status }}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label">Pin</label>
                                <input type="number" class="form-control" name="pin" value="{{ $honorer->pin }}"> 
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">OPD</label>
                            <input type="text" class="form-control" name="opd" value="{{ $honorer->opd }}"> 
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Kecamatan</label>
                            <input type="text" class="form-control" name="kec" value="{{ $honorer->kec }}"> 
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="{{ $honorer->tempat_lahir }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Agama</label>
                            <input type="text" class="form-control" name="agama" value="{{ $honorer->agama }}">
                        </div>

                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
