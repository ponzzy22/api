@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-3">
                <div class="card-header">
                    @include('template.utils.btn.back', ['url' => url('informasi')])
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ url($informasi->gambar_informasi) }}" alt="" srcset="" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <h3 class="mb-1">{{ $informasi->judul_informasi }}</h3>
                        <span class="mb-2">{{ $informasi->created_at->format('F j, Y, g:i a') }} |
                            {{ $informasi->category_informasi }}</span>
                        <p>
                            {!! $informasi->isi_informasi !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
