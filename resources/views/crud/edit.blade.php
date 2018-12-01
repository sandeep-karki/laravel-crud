@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <b><i>Edit Student</i></b>
          <hr>
          <form class="form-horizontal" action="{{ route('crud.update', $student->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Name:</label>
              <div class="col-sm-10">
                <input type="text" value="{{ $student->name }}" name="name" class="form-control" id="name" placeholder="Enter name">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">address:</label>
              <div class="col-sm-10">
                <input type="text" value="{{ $student->address }}" name="address" class="form-control" id="address" placeholder="Enter address">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">contact:</label>
              <div class="col-sm-10">
                <input type="number" value="{{ $student->contact }}" name="contact" class="form-control" id="contact" placeholder="Enter contact">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">section:</label>
              <div class="col-sm-10">
                <input type="text" value="{{ $student->section }}" name="section" class="form-control" id="section" placeholder="Enter section">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection