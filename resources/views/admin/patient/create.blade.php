@extends('layout.admin_layout')

@section('title','Manage Patient')
@section('admin_content')





    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Add Agent</h3>
                                <a href="{{ route('patient.index') }}" class="btn btn-primary">Go Back to Patient List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('patient.store') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name">Patient name</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">patient age</label>
                                                <input type="name" name="age" class="form-control" id="age" placeholder="Enter age">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Sex</label>
                                                <input type="name" name="sex" class="form-control" id="sex" placeholder="Enter sex">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Phone number</label>
                                                <input type="name" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">patient Address</label>
                                                <textarea name="address" id="address" rows="4" class="form-control"
                                                          placeholder="Enter address"></textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="category">Reference Name</label>

                                                <select name="agent" id="agent" class="form-control">
                                                    <option value="" style="display: none" selected>Select Reference</option>
                                                    @foreach($agents as $a)
                                                        <option value="{{ $a->id }}"> {{ $a->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
