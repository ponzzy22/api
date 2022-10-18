@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Informasi <a href="{{ url('informasi/create') }}" class="btn btn-dark float-right"><i
                            class="fa fa-plus"></i>Tambah Informasi</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Category Informasi</th>
                            <th>Judul Informasi</th>
                        </thead>
                        @foreach ($list_informasi as $informasi)
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                        <a href="{{ url('informasi', $informasi->id) }}" class="btn btn-dark"><i
                                                class="fa fa-info"></i></a>
                                        <a href="{{ url('informasi', $informasi->id) }}/edit" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        @include('template.utils.btn.delete', [
                                            'url' => url('informasi', $informasi->id),
                                        ])
                                </td>
                                <td>{{ $informasi->category_informasi }}</td>
                                <td>{{ $informasi->judul_informasi }}</td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
