@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Edit Konten
                    @include('template.utils.btn.back', ['url' => url('content')])
                </div>
                <div class="card-body">
                    <form action="{{ url('content', $content->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="control-label">Judul Konten</label>
                            <input type="text" value="{{ $content->judul }}" name="judul" class="form-control">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Tentang</label>
                            <textarea class="form-control" name="tentang" id="" cols="30" rows="2">{{ $content->tentang }}</textarea>
                            @error('tentang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Visi</label>
                            <textarea class="form-control" name="visi" id="" cols="30" rows="2">{{ $content->visi }}</textarea>
                            @error('visi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Misi</label>
                            <textarea class="form-control" name="misi" id="" cols="30" rows="2">{{ $content->misi }}</textarea>
                            @error('misi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Maklumat Layanan</label>
                            <input type="file" class="form-control" name="selayang">
                            @error('maklumat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Selayang Pandang</label>
                            <textarea class="form-control" name="selayang" id="" cols="30" rows="2">{{ $content->selayang }}</textarea>
                            @error('selayang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Layanan</label>
                            <textarea class="form-control" name="layanan" id="" cols="30" rows="2">{{ $content->layanan }}</textarea>
                            @error('layanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i>Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
