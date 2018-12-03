@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    <br>
                    @endif
                    <a href="{{ route('crud.create') }}" class="btn btn-success">Add New</a>
                    <br><br>
                    <b>Stdents List</b>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>s.no</th>
                                <th>name</th>
                                <th>address</th>
                                <th>contact</th>
                                <th>section</th>
                                <th>image</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->contact}}</td>
                                <td>{{$student->section}}</td>
                                <td> <img src="{{ asset('/uploads/appsetting/' . $student->image) }}" style="width:100px; height:50px;" /> </td>
                                <td>
                                    <div class="row">
                                        <form action="{{ route('crud.destroy', $student->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('crud.edit', $student->id) }}" class="btn btn-success" >Edit</a> /
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection