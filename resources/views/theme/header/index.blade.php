@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Header
                    @if ($list_header->count() === 0)
                        <a href="{{ url('header/create') }}" class="btn btn-dark float-right"><i class="fa fa-plus"></i>
                            Tambah Header</a>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama Website</th>
                            <th>tanggal upload</th>
                        </thead>
                        <tbody>
                            @foreach ($list_header as $header)
                        <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>

                                    <a href="{{ url('header', $header->id) }}" class="btn btn-dark"><i
                                            class="fa fa-info"></i></a>
                                    <a href="{{ url('header', $header->id) }}/edit" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    @include('template.utils.btn.delete', [
                                        'url' => url('header', $header->id),
                                    ])

                            </td>
                            <td>{{ $header->nama_website }}</td>
                            <td>{{ $header->created_at->format('F j, Y, g:i a') }}</td>
                        </tbody>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
