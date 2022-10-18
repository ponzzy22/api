@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Artikel
                    @include('template.utils.btn.back', ['url' => url('artikel')])
                </div>
                <div class="card-body">
                    <img src="{{ url($artikel->gambar_artikel) }}" class="img-fluid" alt="" srcset="">
                    <h3>{{ $artikel->judul_artikel }}</h3>
                    <span class="mb-1">{{ $artikel->created_at->format('F j, Y, g:i a') }}</span>
                    <p>{!! $artikel->isi_artikel !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
