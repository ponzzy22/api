@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Theme Footer @if ($list_footer->count() === 0)
                        <a href="{{ url('footer/create') }}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> Tambah
                            Footer</a>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Media Sosial</th>
                                <th>Koordinat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $nomor = 1;
                            @endphp
                            @foreach ($list_footer as $footer)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                            <a href="{{ url('footer', $footer->id) }}" class="btn btn-dark"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ url('footer', $footer->id) }}/edit" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i></a>
                                            @include('template.utils.btn.delete', ['url' => url('footer', $footer->id)])
                                    </td>
                                    <td>{{ $footer->email }}</td>
                                    <td>{{ $footer->alamat }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
