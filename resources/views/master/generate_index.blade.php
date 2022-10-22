@extends('master.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-header">
            Generate Token API 
            <a href="{{route('generate.update.index')}}" target="__blank" class="btn btn-warning float-right"><i class="fa fa-plus"></i>Update Token User</a>
            <a href="{{route('generate.new.index')}}" target="__blank" class="btn btn-success float-right"><i class="fa fa-edit"></i>Generate Token & Register User</a>
        </div>  <hr>
        <div class="card my-3">
            <div class="card-header">
                Daftar User <a href="" class="btn btn-dark float-right" data-toggle="modal"
                data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah User</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($user as $hasil => $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->username }}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#datainfo-{{ $result->id }}"
                                    class="btn btn-info"><i class="fa fa-info"></i></a>
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
                                <h4>Tambah User </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <label for="" class="control-label">Username</label>
                                            <input type="text"
                                            class="form-control @error('username')
                                            is-invalid
                                            @enderror"
                                            name="username">
                                        </div>
                                        <div class="col-md-6">
                                           <label for="" class="control-label">Email</label>
                                           <input type="email"
                                           class="form-control @error('email')
                                           is-invalid
                                           @enderror"
                                           name="email">
                                       </div>
                                   </div>

                                   <div class="row mt-4">
                                    <div class="col-md-12">
                                       <label for="" class="control-label">Email</label>
                                       <input type="email"
                                       class="form-control @error('email')
                                       is-invalid
                                       @enderror"
                                       name="email">
                                   </div>
                               </div>

                               <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" class="control-label">Token</label>
                                    <input type="text" value="Bearer " 
                                    class="form-control @error('token')
                                    is-invalid
                                    @enderror"
                                    name="token">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="" class="control-label">NIP</label>
                                    <input type="text"
                                    class="form-control @error('nip')
                                    is-invalid
                                    @enderror"
                                    name="nip">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="control-label">Password</label>
                                    <input type="text"
                                    class="form-control @error('password')
                                    is-invalid
                                    @enderror"
                                    name="password">
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

        <!-- MODAL DETAIL -->
        @foreach ($user as $hasil => $result)
        <div class="modal fade" id="datainfo-{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Detail Admin </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <tr>
                                <th class="text text-secondary">Username</th>
                                <th>{{ $result->username }}</th>
                            </tr>
                            <tr>
                                <th class="text text-secondary">Token</th>
                                <th>{{ $result->token }}</th>
                            </tr>
                            <tr>
                                <th class="text text-secondary">NIP</th>
                                <th>{{ $result->nip }}</th>
                            </tr>
                            <tr>
                                <th class="text text-secondary">Email</th>
                                <th>{{ $result->email }}</th>
                            </tr>
                            <tr>
                                <th class="text text-secondary">Password</th>
                                <th>{{ $result->password }}</th>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- MODAL UBAH  -->
        @foreach ($user as $hasil => $result)
        <div class="modal fade" id="dataedit-{{ $result->id }}" tabindex="-1" role="dialog"
            aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Ubah  </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.update', $result->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="control-label">Username</label>
                                    <input type="text" value="{{ $result->username }}"
                                    class="form-control @error('username')
                                    is-invalid
                                    @enderror"
                                    name="username">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" value="{{ $result->email }}"
                                    class="form-control @error('email')
                                    is-invalid
                                    @enderror"
                                    name="email">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" class="control-label">Token</label>
                                    <input type="text" value="{{ $result->token }}"
                                    class="form-control @error('token')
                                    is-invalid
                                    @enderror"
                                    name="token">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="" class="control-label">NIP</label>
                                    <input type="text" value="{{ $result->nip }}"
                                    class="form-control @error('nip')
                                    is-invalid
                                    @enderror"
                                    name="nip">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="control-label">Password</label>
                                    <input type="text" value="{{ $result->password }}"
                                    class="form-control @error('password')
                                    is-invalid
                                    @enderror"
                                    name="password">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-dark float-right"><i class="fa fa-save"></i>
                            Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- MODAL HAPUS   -->
        @foreach ($user as $hasil => $result)
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
                            <h5>Apakah anda yakin untuk menghapus User ini?</h5>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('user.destroy', $result->id) }}" method="POST">
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
