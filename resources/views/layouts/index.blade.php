@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" style="position: absolute; left: 80%; top: 5px; border-radius: 20px" data-toggle="modal" data-target="#exampleModal">
    Add Question
  </button>
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
          <h5 class="card-title" style="float:right; font-style: italic; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Category: {{ $exam->category ?? 'Filter'}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Question: {{ $exam->question ?? 'Filter'}}</h6>
          <p class="card-text">A: {{ $exam->option_1 ?? 'Filter'}}</p>
          <p class="card-text">B: {{ $exam->option_2 ?? 'Filter'}}</p>
          <p class="card-text">C: {{ $exam->option_3 ?? 'Filter'}}</p>
          <p class="card-text">D: {{ $exam->option_4 ?? 'Filter'}}</p>
          <button class="btn btn-warning" style="border-radius: 10px; padding: 5px" data-toggle="modal" data-target="#exampleModal2"> Edit</button>
          <form id="delete" method="POST" action="{{ route('exam.delete',$exam->id) }}">
          @csrf
          <button class="btn btn-danger" type="submit" style="border-radius: 10px; padding: 5px; float:right"> Delete</button>
          </form>
        </div>
      </div>

    @endforeach



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('exam.create') }}" id="makeQuest">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Question</label>
                  <input type="text" name="question" class="form-control" id="exampleFormControlInput1" placeholder="What is an API?" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Option 1</label>
                    <input type="text" name="option_1" class="form-control" id="exampleFormControlInput1" placeholder="I dont know" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 2</label>
                    <input type="text" name="option_2" class="form-control" id="exampleFormControlInput1" placeholder="I dont know" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 3</label>
                    <input type="text" name="option_3" class="form-control" id="exampleFormControlInput1" placeholder="I dont know" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 4</label>
                    <input type="text" name="option_4" class="form-control" id="exampleFormControlInput1" placeholder="I dont know" required>
                  </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Category</label>
                  <select class="form-control" name="category" id="exampleFormControlSelect1">
                    <option>technical</option>
                    <option>aptitude</option>
                    <option>logical</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        <div class="modal-body">
            @foreach ($exams as $exam)

            <form method="POST" action="{{ route('exam.edit',$exam->id) }}" id="edit">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Question</label>
                  <input type="text" name="question" class="form-control" id="exampleFormControlInput1" value="{{ $exam->question }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Option 1</label>
                    <input type="text" name="option_1" class="form-control" id="exampleFormControlInput1" value="{{ $exam->option_1 }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 2</label>
                    <input type="text" name="option_2" class="form-control" id="exampleFormControlInput1" value="{{ $exam->option_2 }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 3</label>
                    <input type="text" name="option_3" class="form-control" id="exampleFormControlInput1" value="{{ $exam->option_3 }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 4</label>
                    <input type="text" name="option_4" class="form-control" id="exampleFormControlInput1" value="{{ $exam->option_4 }}" required>
                  </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Category</label>
                  <select class="form-control" name="category" id="exampleFormControlSelect1">
                    <option>technical</option>
                    <option>aptitude</option>
                    <option>logical</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </form>

              @endforeach

        </div>
      </div>
    </div>
  </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('form#makeQuest').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = $(this).serialize();
        axios.post(url, data)
            .then(function (response) {
                if (response.data.success == true) {
                    $('#exampleModal').modal('hide');
                    $('#makeQuest')[0].reset();
                } else {
                    console.log(response.data.message)
                }
            })
            .catch(function (error) {
                console.log(error)

            });
    });

    $('form#delete').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        axios.post(url)
            .then(function (response) {
                alert('Successful Delete!')
            })
            .catch(function (error) {
                console.log(error)

            });
    });

    $('form#edit').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        axios.post(url)
            .then(function (response) {
                alert('Successful Edit!')
            })
            .catch(function (error) {
                console.log(error)

            });
    });


    </script>
@endsection
