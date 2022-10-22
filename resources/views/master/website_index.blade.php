@extends('master.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card my-3">
            <div class="card-header">
                Daftar Website  <a href="" class="btn btn-dark float-right" data-toggle="modal"
                data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Website</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama Web</th>
                        <th>Status</th>
                        <th>Lihat Web</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($web as $hasil => $result)
                        <tr>
                            <td style="width: 10px;">{{ $loop->iteration }}</td>
                            <td style="width: 300px;">{{ $result->nama_web }}</td>
                            <td style="width: 100px;">{!! $result->status_web !!}</td>
                            <td style="width: 100px;"><a href="{{ $result->link_web }}" target="_blank" rel="noopener noreferrer">Link Web</a></td>
                            <td style="width: 100px;">
                                <a href="" data-toggle="modal" data-target="#dataedit-{{ $result->id }}"
                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="" data-toggle="modal" data-target="#datahapus-{{ $result->id }}"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL TAMBAH   -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Tambah Website </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('web.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="control-label">Nama Website</label>
                                    <input type="text"
                                    class="form-control @error('nama_web')
                                    is-invalid
                                    @enderror"
                                    name="nama_web">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" class="control-label">Link Website</label>
                                    <input type="text" placeholder="http://"
                                    class="form-control @error('link_web')
                                    is-invalid
                                    @enderror"
                                    name="link_web">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="" class="control-label">Status Website</label>
                                    <select class="form-control" name="status_web">
                                        <option value="" holder>Pilih Status Web</option>
                                        <option value="<label class='badge badge-success badge-pill'>Aktif</label>">Aktif</option>
                                        <option value="<label class='badge badge-warning badge-pill'>Perbaikan</label>">Perbaikan</option>
                                        <option value="<label class='badge badge-danger badge-pill'>Tidak Aktif</label>">Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="control-label">Pilih User</label>
                                    <select class="form-control" name="token_id">
                                        <option value="" holder>Pilih User</option>
                                        @foreach ($token as $result)
                                        <option value="{{ $result->id }}">{{ $result->username }}</option>
                                        select
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL UBAH  -->
        @foreach ($web as $hasil => $result)        
        <div class="modal fade" id="dataedit-{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Ubah Website </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('web.update', $result->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="control-label">Nama Website</label>
                                    <input type="text" value="{{ $result->nama_web }}"
                                    class="form-control @error('nama_web')
                                    is-invalid
                                    @enderror"
                                    name="nama_web">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" class="control-label">Link Website</label>
                                    <input type="text" value="{{ $result->link_web }}"
                                    class="form-control @error('link_web')
                                    is-invalid
                                    @enderror"
                                    name="link_web">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="" class="control-label">Status Website</label>
                                    <select class="form-control" name="status_web">
                                        <option value="{{ $result->status_web }}" holder>{!! $result->status_web !!}</option>
                                        <option value="<label class='badge badge-success badge-pill'>Aktif</label>">Aktif</option>
                                        <option value="<label class='badge badge-warning badge-pill'>Perbaikan</label>">Perbaikan</option>
                                        <option value="<label class='badge badge-danger badge-pill'>Tidak Aktif</label>">Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="control-label">Pilih User</label>
                                    <select class="form-control" name="token_id">
                                        <option value="{{ $result->token_id }}" holder>{{ $result->token_id }}</option>
                                        @foreach ($token as $result)
                                        <option value="{{ $result->id }}">{{ $result->username }}</option>
                                        select
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- MODAL HAPUS   -->
        @foreach ($web as $hasil => $result)
        <div class="modal fade" id="datahapus-{{ $result->id }}" tabindex="-1" role="dialog"
            aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel"><i class="fa fa-eye"></i>
                            {{ $result->username }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Apakah anda yakin untuk menghapus Website ini?</h5>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('web.destroy', $result->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href=""><button type="submit" class="btn btn-success"> Hapus</button></a>
                            </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endsection
