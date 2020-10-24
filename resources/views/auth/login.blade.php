@extends('layouts.app')

@section('content')
<div class="container h-100" style="height: 100vh !important;">
    <div class="row h-100 d-flex align-items-center justify-content-center">
        <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-12 order-2">
            <div class="card border-0 bg-transparent">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        The Email is <strong>qualify@gmail.com</strong> and Password is <strong>987654321</strong>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputEmail" class="font-weight-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                   placeholder="Enter email" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="font-weight-bold">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                   placeholder="Password" autocomplete="off">
                        </div>

                        <div class="col-12 px-0 text-right">
                            <button type="submit" class="btn btn-primary mb-3 w-100 font-weight-bold">Login</button>
                        </div>
                    </form>
                    <div class="text-right m-4">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                    <span class="badge badge-default text-dark">{{ __(' Create a New Account ') }}
                                    </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
