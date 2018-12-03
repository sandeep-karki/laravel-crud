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
          <b><i>Create Student</i></b>
          <hr>
          <form class="form-horizontal" action="{{ route('crud.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">name:</label>
              <div class="col-sm-10">
                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="Enter name">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="address">address:</label>
              <div class="col-sm-10">
                <input type="text" value="{{ old('address') }}" name="address" class="form-control" id="address" placeholder="Enter address">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="contact">contact:</label>
              <div class="col-sm-10">
                <input type="number" value="{{ old('contact') }}" name="contact" class="form-control" id="contact" placeholder="Enter contact">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="section">section:</label>
              <div class="col-sm-10">
                <input type="text" value="{{ old('section') }}" name="section" class="form-control" id="section" placeholder="Enter section">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">email:</label>
              <div class="col-sm-10">
                <input type="text" value="{{ old('email') }}" name="email" class="form-control" id="email" placeholder="Enter email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="image">image:</label>
              <div class="col-sm-10">
                <input type="file" name="image" id="image">
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