@extends('frontend.layouts.app')
@section('content')
    <div class="d-flex justify-content-center">


        <form action="/confirm/{{ $token }}" method="POST" class="col-lg-4">
            @csrf

            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $err }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
            @if (session()->has('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Masukan Kode Verifikasi</label>
                <input type="number" name="kode" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <input type="hidden" name="token" value="{{ $token }}" name="" id="">
            </div>




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
