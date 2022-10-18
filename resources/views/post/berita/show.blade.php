@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    @include('template.utils.btn.back',['url'=> url('berita')])
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ url($berita->poto) }}" alt="" srcset="" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <h3 class="mb-1">{{ $berita->judul }}</h3>
                        <span class="mb-2">{{ $berita->created_at->format('F j, Y, g:i a') }}</span>
                        <p>
                            {!! $berita->isi !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
