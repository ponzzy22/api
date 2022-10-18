@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    <h3>Tambah Konten</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('content/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="" class="control-label">Judul Konten</label>
                            <input type="text" name="judul" class="form-control">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Tentang</label>
                            <textarea class="form-control" name="tentang" id="" cols="30" rows="2"></textarea>
                            @error('tentang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Visi</label>
                            <textarea class="form-control" name="visi" id="" cols="30" rows="2"></textarea>
                            @error('visi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Misi</label>
                            <textarea class="form-control" name="misi" id="" cols="30" rows="2"></textarea>
                            @error('misi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Maklumat Layanan</label>
                            <textarea class="form-control" name="maklumat" id="" cols="30" rows="2"></textarea>
                            @error('maklumat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Selayang Pandang</label>
                           <input type="file" class="form-control" name="selayang">
                            @error('selayang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Layanan</label>
                            <textarea class="form-control" name="layanan" id="" cols="30" rows="2"></textarea>
                            @error('layanan')
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
