@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Post Berita <a href="{{ url('berita/create') }}" class="btn btn-dark float-right"><i
                            class="fa fa-plus"></i> Tambah Post</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Judul</th>
                            <th>tanggal upload</th>
                        </thead>
                        <tbody>
                            @foreach ($list_berita as $berita)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                            <a href="{{ url('berita', $berita->id) }}" class="btn btn-dark"><i
                                                    class="fa fa-info"></i></a>
                                            <a href="{{ url('berita', $berita->id) }}/edit" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i></a>
                                            @include('template.utils.btn.delete', ['url' => url('berita', $berita->id)])
                                    </td>
                                    <td>{{ $berita->judul }}</td>
                                    <td>{{ $berita->created_at->format('F j, Y, g:i a') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
