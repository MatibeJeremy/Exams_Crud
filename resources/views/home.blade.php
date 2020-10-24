@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




                    <a href="{{ route('exam.index') }}"> <button class="btn btn-primary" style="float:right; border-radius:20px"> View Exams</button></a>
                    <a href="{{ route('exam.index') }}"><button class="btn btn-warning" style="border-radius:20px"> Edit Exams</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
