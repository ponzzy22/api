@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Gambar <a href="{{ url('struktural/create') }}" class="btn btn-dark float-right" data-toggle="modal"
                        data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Gambar</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal Post</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($gambar as $hasil => $result)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ url( $result->image) }}" width="100px" alt="image"></td>
                                    <td>{{ $result->judul }}</td>
                                    <td>{{ $result->created_at->format('d-M-Y') }}</td>
                                    <td>
                                            <button data-toggle="modal" data-target="#datareg2-{{ $result->id }}"
                                                class="btn btn-info"><i class="fa fa-info "></i></button>
                                            <a href="" data-toggle="modal"
                                                data-target="#dataedit-{{ $result->id }}" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="" data-toggle="modal"
                                                data-target="#datahapus-{{ $result->id }}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <--------------- MODAL TAMBAH GAMBAR ---------------> --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah Gambar </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true"></span>
                    </button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('media-gambar.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="" class="control-label">Judul</label>
                            <input type="text"
                                class="form-control @error('judul')
                                is-invalid
                            @enderror"
                                name="judul">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">File Gambar</label>
                            <input type="file" accept=".png, .jpeg, .jpg"
                                class="form-control @error('jabatan')
                                is-invalid
                            @enderror"
                                name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Post</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    {{-- <--------------- MODAL DETAIL GAMBAR ---------------> --}}
    @foreach ($gambar as $hasil => $result)
        <div class="modal fade" id="datareg2-{{ $result->id }}" tabindex="-1" role="dialog"
            aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel"><i class="fa fa-eye"></i>
                            {{ $result->judul }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ url( $result->image) }}" alt="gambar" width="500px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <--------------- MODAL UBAH GAMBAR ---------------> --}}
    @foreach ($gambar as $hasil => $result)
        <div class="modal fade" id="dataedit-{{ $result->id }}" tabindex="-1" role="dialog"
            aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Ubah Gambar </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true"></span>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('media-gambar.update', $result->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="" class="control-label">Judul</label>
                                <input type="text" value="{{ $result->judul }}"
                                    class="form-control @error('judul')
                                is-invalid
                            @enderror"
                                    name="judul">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="control-label">File Gambar</label>
                                <input type="file" accept=".png, .jpeg, .jpg"
                                    class="form-control @error('jabatan')
                                is-invalid
                            @enderror"
                                    name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-dark float-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <--------------- MODAL HAPUS GAMBAR ---------------> --}}
    @foreach ($gambar as $hasil => $result)
        <div class="modal fade" id="datahapus-{{ $result->id }}" tabindex="-1" role="dialog"
            aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel"><i class="fa fa-eye"></i>
                            {{ $result->judul }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Apakah anda yakin untuk menghapus gambar ini?</h5>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('media-gambar.destroy', $result->id) }}" method="POST">
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
