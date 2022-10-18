@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-5">
                <div class="card-header">
                    Header @include('template.utils.btn.back', ['url' => url('header')])
                </div>
                <div class="card-body">
                    <form action="{{ url('header', $header->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="control-label ">Favicon</label>
                            <input type="file" class="form-control @error('favicon') is-invalid @enderror"
                                name="favicon">
                            @error('favicon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Nama
                                Website</label>
                            <input type="text" class="form-control @error('nama_website') is-invalid @enderror"
                                name="nama_website" value="{{ $header->nama_website }}">
                            @error('nama_website')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Singkatan
                                Website</label>
                            <input type="text" class="form-control @error('singkatan_website') is-invalid @enderror"
                                name="singkatan_website" value="{{ $header->singkatan_website }}">
                            @error('singkatan_website')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Tag
                                Line Website</label>
                            <input type="text" class="form-control @error('tag_line_website') is-invalid @enderror"
                                name="tag_line_website" value="{{ $header->tag_line_website }}">
                            @error('tag_line_website')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="10"
                                class="form-control @error('alamat') is-invalid @enderror">{{ $header->alamat }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $header->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Deskripsi
                                Singkat</label>
                            <textarea name="deskripsi_singkat" id="" cols="30" rows="10"
                                class="form-control @error('deskripsi_singkat') is-invalid @enderror">{{ $header->deskripsi_singkat }}</textarea>
                            @error('deskripsi_singkat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Logo</label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Img Background
                                Utama</label>
                            <input type="file" name="img_background_utama" id=""
                                class="form-control @error('img_background_utama') is-invalid @enderror"
                                accept=".png, .jpg , .jpge">
                            @error('img_background_utama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="control-label ">Img Background
                                        1</label>
                                    <input type="file" name="img_background_1" id=""
                                        class="form-control @error('img_background_1') is-invalid @enderror"
                                        accept=".png, .jpg , .jpge">
                                    @error('img_background_1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="control-label ">Img
                                        Background 2</label>
                                    <input type="file" name="img_background_2" id=""
                                        class="form-control @error('img_background_2') is-invalid @enderror"
                                        accept=".png, .jpg , .jpge">
                                    @error('img_background_2')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="control-label ">Img
                                        Background 3</label>
                                    <input type="file" name="img_background_3" id=""
                                        class="form-control @error('img_background_3') is-invalid @enderror"
                                        accept=".png, .jpg , .jpge">
                                    @error('img_background_3')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label ">Text
                                Utama</label>
                            <textarea name="text_utama" id="" cols="30" rows="10"
                                class="form-control @error('text_utama') is-invalid @enderror">{{ $header->text_utama }}</textarea>
                            @error('text_utama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
