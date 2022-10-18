@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Informasi
                    @include('template.utils.btn.back', ['url' => url('informasi')])
                </div>
                <div class="card-body">
                    <form action="{{ url('informasi') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="control-label">Judul Informasi</label>
                            <input type="text"
                                class="form-control @error('judul_informasi') is-invalid

                            @enderror"
                                name="judul_informasi">
                            @error('judul_informasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Category Informasi</label>
                            <input type="text"
                                class="form-control @error('category_informasi') is-invalid

                            @enderror"
                                name="category_informasi">
                            @error('category_informasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Gambar Informasi</label>
                            <input type="file"
                                class="form-control @error('gambar_informasi') is-invalid

                            @enderror"
                                name="gambar_informasi">
                            @error('gambar_informasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Isi Informasi</label>
                            <textarea name="isi_informasi" id="" cols="30" rows="10"
                                class="form-control summernote @error('isi_informasi') is-invalid

                            @enderror"></textarea>
                            @error('isi_informasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Tambah Informasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('template.utils.sumernote')
