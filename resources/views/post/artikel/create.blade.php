@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-4">
                <div class="card-header">
                    Artikel
                    @include('template.utils.btn.back', ['url' => url('artikel')])
                </div>
                <div class="card-body">
                    <form action="{{ url('artikel') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="control-label">Judul Artikel</label>
                            <input type="text"
                                class="form-control @error('judul_artikel')
                                is-invalid
                            @enderror"
                                name="judul_artikel">
                            @error('judul_artikel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Gambar Artikel</label>
                            <input type="file"
                                class="form-control @error('gambar_artikel')
                                is-invalid
                            @enderror"
                                name="gambar_artikel" accept=".png , .jpg , .jpge">
                            @error('gambar_artikel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Isi Artikel</label>
                            <textarea name="isi_artikel" id="" cols="30" rows="10"
                                class="form-control summernote @error('isi_artikel')
                                is-invalid
                            @enderror"></textarea>
                            @error('isi_artikel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i>Tambah Artikel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('template.utils.sumernote')
