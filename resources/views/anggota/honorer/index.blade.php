@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    Anggota Honorer <a href="{{ url('honorer/create') }}" class="btn btn-dark float-right"><i
                            class="fa fa-plus"></i>Tambah Anggota</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>OPD</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $nomor = 1;
                            @endphp
                            @foreach ($list_honorer as $honorer)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                            <a href="{{ url('honorer', $honorer->id) }}" class="btn btn-dark"><i
                                                    class="fa fa-info"></i></a>
                                            <a href="{{ url('honorer', $honorer->id) }}/edit" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{ url('honorer', $honorer->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('apakah ingin menghapus Anggota honorer?')"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>

                                    </td>
                                    <td>{{ $honorer->nama }}</td>
                                    <td>{{ $honorer->nip }}</td>
                                    <td>{{ $honorer->opd }}</td>
                                    <td>{{ $honorer->status }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
