@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Publikasi
                    @include('template.utils.btn.back', ['url' => url('publikasi')])
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url($publikasi->gambar_publikasi) }}" class="img-fluid" alt="" srcset="">
                        </div>
                        <div class="col-md-6">
                            <h4 class="mt-3">{{ $publikasi->judul_publikasi }}</h4>
                            <span>{{ $publikasi->created_at->format('F j, Y, g:i a') }}</span>
                            <table class="table mt-2">
                                <thead>
                                    <th>No</th>
                                    <th>Aksi</th>
                                </thead>
                                @foreach ($data as $item)
                                    <tbody>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ url("post/publikasi/", $item) }}" class="btn btn-warning" target="_blank">Download</a></td>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
