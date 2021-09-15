@extends('layout.admin_layout')

@section('title','Manage Agent')
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
                                <a href="{{ route('agent.index') }}" class="btn btn-primary">Go Back to Agent List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <form action="{{ route('agent.store') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')
                                            <div class="form-group">
                                                <label for="name">Agent name</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Agent Phone Number</label>
                                                <input type="name" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Agent Nid Number</label>
                                                <input type="name" name="nid" class="form-control" id="nid" placeholder="Enter Nid Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Agent Email id</label>
                                                <input type="name" name="email" class="form-control" id="email" placeholder="Enter Email Id">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Agent Address</label>
                                                <textarea name="address" id="address" rows="4" class="form-control"
                                                          placeholder="Enter address"></textarea>
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
