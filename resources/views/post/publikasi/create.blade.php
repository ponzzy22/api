@extends('template.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 my-5">
            <div class="card">
                <div class="card-header">
                    Publikasi
                    @include('template.utils.btn.back', ['url' => url('publikasi')])
                </div>
                <div class="card-body">
                    <form action="{{ url('publikasi') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="control-label">Judul Publikasi</label>
                            <input type="text" class="form-control @error('judul_publikasi') is-invalid @enderror"
                                name="judul_publikasi">
                            @error('judul_publikasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Gambar Publikasi</label>
                            <input type="file" class="form-control @error('gambar_publikasi') is-invalid @enderror"
                                name="gambar_publikasi">
                            @error('gambar_publikasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="control-label">Asset Publikasi</label>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    File your upload no valid
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="input-group hdtuto control-group lst increment">
                                <input type="file" class="myfrm form-control" name="asset_publikasi[]">
                                <div class="input-group-btn ml-2">
                                    <button class="btn btn-success btn-add" type="button"><i
                                            class="fa fa-plus"></i>Add</button>
                                </div>
                            </div>
                            <div class="clone hide">
                                <div class="hdtuto control-group lst input-group" style="margin-top: 10px">
                                    <input type="file" class="myfrm form-control" name="asset_publikasi[]">
                                    <div class="input-group-btn ml-2">
                                        <button class="btn btn-danger btn-del" type="button"> <i class="fa fa-trash"></i>
                                            Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-dark float-right" type="submit"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-add").click(function() {
                var lsthtml = $(".clone").html();
                $(".increment").after(lsthtml);
            });
            $("body").on("click", ".btn-del", function() {
                $(this).parents(".hdtuto").remove();
            });
        });
    </script>
@endsection
