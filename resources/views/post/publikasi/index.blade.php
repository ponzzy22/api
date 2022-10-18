@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Publikasi <a href="{{ url('publikasi/create') }}" class="btn btn-dark float-right"><i
                            class="fa fa-plus"></i>Tambah Publikasi</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Judul Publikasi</th>
                            <th>Tanggal Publikasi</th>
                        </thead>
                        <tbody>
                            @foreach ($list_publikasi as $publikasi)
                        <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                    <a href="{{ url('publikasi', $publikasi->id) }}" class="btn btn-dark"><i
                                            class="fa fa-info"></i></a>
                                    <a href="{{ url('publikasi', $publikasi->id) }}/edit" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    @include('template.utils.btn.delete', [
                                        'url' => url('publikasi', $publikasi->id),
                                    ])
                            </td>
                            <td>{{ $publikasi->judul_publikasi }}</td>
                            <td>{{ $publikasi->created_at->format('F j, Y, g:i a') }}</td>
                        </tbody>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
