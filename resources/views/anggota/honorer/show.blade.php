@extends('template.app')

@section('content')
    <div class="page-content-wrapper">
        <div class="content">
            <div class="jumbotron" data-pages="parallax">
                <div class="container">
                    <div class="inner" style="transform: translateY(0px); opacity: 1;">
                        <h2>Anggota Honorer</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="">
                            @if ($honorer->foto)
                            <div class="card">
                                <img src="{{ url($honorer->foto) }}" class="img-fluid profile-pic-container" style="width: 100%">
                            </div>
                            @else
                            <div class="card">
                                <img src="{{ url('assets/profile.jpg') }}" class="img-fluid profile-pic-container" style="width: 100%">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="card-title">Data Anggota</div>
                                <div class="pull-right" style="margin-top : -13px">
                                    <a href="{{ url('honorer') }}" class="btn btn-dark float-right"><i
                                        class="fa fa-arrow-left"></i>Back</a>
                                </div>
                            </div>
                            <hr class="no-margin">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Nama</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->nama }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">NIP</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->nip }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Jabatan</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->jabatan }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Email</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->pegawai_email }}i
                                            </p>
                                        </div>
                                        
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Status</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->status }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">OPD</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->opd }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Kecamatan</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->kec }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Agama</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->agama }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Pin</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->pin }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <label for="" class="control-label col-md-4">Golongan</label>
                                            <p type="text" class="form-control-static col-md-8">{{ $honorer->gol }}
                                            </p>
                                        </div>
                                        <a href="{{url('honorer', $honorer->id)}}/edit" class="btn btn-info float-right border-0" ><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection
