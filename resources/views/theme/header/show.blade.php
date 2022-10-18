@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Header @include('template.utils.btn.back', ['url' => url('header')])
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ url($header->favicon) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <dl class="mt-5">
                                <dt>Nama Website</dt>
                                <dd>{{ $header->nama_website }}</dd>
                                <dt>Singkatan Website</dt>
                                <dd>{{ $header->singkatan_website }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-5">
                            <dl class="mt-5">
                                <dt>Tag line Website</dt>
                                <dd>{{ $header->tag_line_website }}</dd>
                                <dt>Phone</dt>
                                <dd>{{ $header->phone }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <dl class="p-3">
                                <dt>Logo</dt>
                                <dd><img src="{{ url($header->logo) }}" class="img-fluid" alt=""
                                        srcset="">
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="p-3">
                                <dt>Text Utama</dt>
                                <dd>{{ $header->text_utama }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="p-3">
                                <dt>Alamat</dt>
                                <dd>{{ $header->alamat }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="p-3">
                                <dt>Deskripsi Singkat</dt>
                                <dd>{{ $header->deskripsi_singkat }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-3 p-3">
                            <dl>
                                <dt>Img Background Utama</dt>
                                <dd><img src="{{ url($header->img_background_utama) }}" class="img-fluid"
                                        alt="" srcset=""></dd>
                            </dl>
                        </div>
                        <div class="col-md-3 p-3">
                            <dl>
                                <dt>Img Background 1</dt>
                                <dd><img src="{{ url($header->img_background_1) }}" class="img-fluid"
                                        alt="" srcset=""></dd>
                            </dl>
                        </div>
                        <div class="col-md-3 p-3">
                            <dl>
                                <dt>Img Background 2</dt>
                                <dd><img src="{{ url($header->img_background_2) }}" class="img-fluid"
                                        alt="" srcset=""></dd>
                            </dl>
                        </div>
                        <div class="col-md-3 p-3">
                            <dl>
                                <dt>Img Background 3</dt>
                                <dd><img src="{{ url($header->img_background_3) }}" class="img-fluid"
                                        alt="" srcset=""></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
