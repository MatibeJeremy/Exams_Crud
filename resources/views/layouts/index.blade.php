@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" style="position: absolute; left: 80%; top: 5px; border-radius: 20px" data-toggle="modal" data-target="#exampleModal">
    Add Question
  </button>
  <div class="card" style="width: 45rem; top: 60px; border-radius:20px">
    <div class="card-body">
      <h5 class="card-title">No: </h5>
      <h6 class="card-subtitle mb-2 text-muted">Question:</h6>
      <p class="card-text">A: </p>
      <p class="card-text">B: </p>
      <p class="card-text">C: </p>
      <p class="card-text">D: </p>
      <button class="btn btn-warning" style="border-radius: 10px; padding: 5px"> Edit</button>
      <button class="btn btn-success" style="border-radius: 10px; padding: 5px"> Update</button>
      <button class="btn btn-danger" style="border-radius: 10px; padding: 5px"> Delete</button>
    </div>
  </div>

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
            <form action="{{ route('exam.create') }}" id="makeQuest">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Question</label>
                  <input type="text" name="question" class="form-control" id="exampleFormControlInput1" placeholder="What is an API?">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Option 1</label>
                    <input type="text" name="option_1" class="form-control" id="exampleFormControlInput1" placeholder="I dont know">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 2</label>
                    <input type="text" name="option_2" class="form-control" id="exampleFormControlInput1" placeholder="I dont know">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 3</label>
                    <input type="text" name="option_3" class="form-control" id="exampleFormControlInput1" placeholder="I dont know">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Option 4</label>
                    <input type="text" name="option_4" class="form-control" id="exampleFormControlInput1" placeholder="I dont know">
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
        </div>
    </div>
</div>
@endsection
@section('script')
    @include('SCRIPTS.script')
@endsection
