@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header" style="text-align: center">
                    Anggota PPTK
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
                            @foreach ($list_pptk as $pptk)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('pptk', $pptk->id) }}" class="btn btn-dark"><i class="fa fa-eye">
                                                    Show</i></a>
                                        </div>
                                    </td>
                                    <td>{{ $pptk->nama }}</td>
                                    <td>{{ $pptk->nip }}</td>
                                    <td>{{ $pptk->opd }}</td>
                                    <td>{{ $pptk->status }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
