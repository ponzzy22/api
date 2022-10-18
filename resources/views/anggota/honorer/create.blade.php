@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    <h3>Anggota Honorer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('honorer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="control-label">Nama</label>
                            <input type="text"
                                class="form-control @error('nama')
                                is-invalid
                            @enderror"
                                name="nama">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Email</label>
                            <input type="text"
                                class="form-control @error('pegawai_email')
                                is-invalid
                            @enderror"
                                name="pegawai_email" id="" cols="30" rows="10"></textarea>
                            @error('pegawai_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label">Jabatan</label>
                                <input type="text"
                                    class="form-control @error('jabatan')
                                        is-invalid
                                    @enderror"
                                    name="jabatan">
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label">NIP</label>
                                <input type="number"
                                    class="form-control @error('nip')
                                        is-invalid
                                    @enderror"
                                    name="nip" id="" cols="30" rows="10"></textarea>
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Golongan</label>
                            <input type="text"
                                class="form-control @error('gol')
                                is-invalid
                            @enderror"
                                name="gol" id="" cols="30" rows="10">
                            @error('gol')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label">Status</label>
                                <input type="text"
                                    class="form-control @error('status')
                                    is-invalid
                                @enderror"
                                    name="status">
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="control-label">Pin</label>
                                <input type="number"
                                    class="form-control @error('pin')
                                    is-invalid
                                @enderror"
                                    name="pin" id="" cols="30" rows="10"></textarea>
                                @error('pin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">OPD</label>
                            <input type="text"
                                class="form-control @error('opd')
                                is-invalid
                            @enderror"
                                name="opd">
                            @error('opd')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Kecamatan</label>
                            <input type="text"
                                class="form-control @error('kec')
                                is-invalid
                            @enderror"
                                name="kec">
                            @error('kec')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Tempat Lahir</label>
                            <input type="text"
                                class="form-control @error('tempat_lahir')
                                is-invalid
                            @enderror"
                                name="tempat_lahir">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Agama</label>
                            <input type="text"
                                class="form-control @error('agama')
                                is-invalid
                            @enderror"
                                name="agama">
                            @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i>Tambah Anggota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
