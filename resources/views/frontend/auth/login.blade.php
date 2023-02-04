@extends('frontend.layouts.app')
@section('content')
    <div class="d-flex justify-content-center">


        <form action="{{ route('login.action') }}" method="POST" class="col-lg-4">
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
                <label for="exampleInputEmail2" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail2"
                    >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
