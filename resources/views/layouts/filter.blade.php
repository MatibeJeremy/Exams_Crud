@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="http://127.0.0.1:8000/exam"><button type="button" class="btn btn-primary" style="position: absolute; left: 80%; top: 5px; border-radius: 20px" data-toggle="modal" data-target="#exampleModal">
                Back
              </button></a>

  <div class="btn-group">
    <form method="POST" action="{{ route('exam.logical') }}" id="logical">
    @csrf
    <button type="submit" style="top:5px" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Filter Exam Categories
    </button>
    <div class="dropdown-menu dropdown-menu-right">
      <button class="dropdown-item" type="button">Technical</button>
      <button class="dropdown-item" type="button">Aptitude</button>
      <button id="logical" class="dropdown-item" type="submit">Logical</button>
    </div>
   </form>
  </div>

  @foreach ($exams as $exam)

    <div class="card" style="width: 45rem; top: 60px; border-radius:20px">
        <div class="card-body">
          <h5 class="card-title">No: {{ $exam->id ?? 'Filter'}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Question: {{ $exam->question ?? 'Filter'}}</h6>
          <p class="card-text">A: {{ $exam->option_1 ?? 'Filter'}}</p>
          <p class="card-text">B: {{ $exam->option_2 ?? 'Filter'}}</p>
          <p class="card-text">C: {{ $exam->option_3 ?? 'Filter'}}</p>
          <p class="card-text">D: {{ $exam->option_4 ?? 'Filter'}}</p>
          <button class="btn btn-warning" style="border-radius: 10px; padding: 5px"> Edit</button>
          <button class="btn btn-success" style="border-radius: 10px; padding: 5px"> Update</button>
          <button class="btn btn-danger" style="border-radius: 10px; padding: 5px"> Delete</button>
        </div>
      </div>

    @endforeach





        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    logical();

    $('form#logical').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = $(this).serialize();
        axios.post(url, data)
            .then(function (response) {
                console.log(response)
            })
            .catch(function (error) {
                console.log(error)

            });
    });
    </script>
@endsection
