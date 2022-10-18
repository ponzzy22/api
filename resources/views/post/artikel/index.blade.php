@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Artikel <a href="{{ url('artikel/create') }}" class="btn btn-dark float-right"><i
                            class="fa fa-plus"></i>Tulis Artikel Baru</a>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Judul Artikel</th>
                            <th>Tanggal Upload</th>
                        </thead>
                        @foreach ($list_artikel as $artikel)
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                        <a href="{{ url('artikel', $artikel->id) }}" class="btn btn-dark"><i
                                                class="fa fa-info"></i></a>
                                        <a href="{{ url('artikel', $artikel->id) }}/edit" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        @include('template.utils.btn.delete', [
                                            'url' => url('artikel', $artikel->id),
                                        ])
                                </td>
                                <td>{{ $artikel->judul_artikel }}</td>
                                <td>{{ $artikel->created_at->format('F j, Y, g:i a') }}</td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
