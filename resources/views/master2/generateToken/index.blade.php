@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    key Generate
                    @if (auth()->user()->key == null)
                        <a href="{{ url('generate/create') }}" class="btn btn-dark float-right"><i class="fa fa-plus"></i> New
                            Generate</a>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Intansi</th>
                                <th>Nama</th>
                                <th>Key</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if (auth()->user()->key)
                                    <td>1</td>
                                    <td>{{ $key->intansi }}</td>
                                    <td>{{ $key->nama }}</td>
                                    <td>{{ $key->key }}</td>
                                    <td>
                                        @include('template.utils.btn.delete', [
                                            'url' => url('generate', $key->id),
                                        ])
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
