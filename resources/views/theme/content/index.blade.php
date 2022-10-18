@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Content
                    @if ($content->count() === 0)
                        <a href="{{ url('content/create') }}" class="btn btn-dark float-right"><i class="fa fa-plus"></i>
                            Tambah Content</a>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Judul Konten</th>
                            <th>tanggal upload</th>
                        </thead>
                        <tbody>
                            @foreach ($content as $hasil => $result)
                        <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="">
                                    <a href="{{ url('content', $result->id) }}/show" class="btn btn-info"><i
                                            class="fa fa-info"></i></a>
                                    <a href="{{ url('content', $result->id) }}" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="" data-toggle="modal" data-target="#datahapus-{{ $result->id }}"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                            <td>{{ $result->judul }}</td>
                            <td>{{ $result->created_at->format('F j, Y, g:i a') }}</td>
                        </tbody>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <--------------- MODAL HAPUS GAMBAR ---------------> --}}
    @foreach ($content as $hasil => $result)
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
                        <h5>Apakah anda yakin untuk menghapus konten ini?</h5>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('content', $result->id) }}" method="POST">
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
