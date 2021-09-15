@extends('layout.admin_layout')

@section('title','Manage Agent')
@section('admin_content')



    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Agent List</h3>
            <a href="{{ route('agent.create') }}" class="btn btn-primary">Add Agent</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Agent Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Nid Number</th>
                    <th>Email Id</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @if($agents->count())
                    @foreach ($agents as $agent)
                <tr>
                    <td>{{$agent->id}}</td>
                    <td>{{$agent->name}}</td>
                    <td>
                        {{$agent->phone}}
                    </td>
                    <td>
                        {{$agent->address}}
                    </td>
                    <td>
                        {{$agent->nid}}
                    </td>
                    <td>
                        {{$agent->email}}
                    </td>

                    <td class="d-flex">
                        <a href="#" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                        <form action="#" class="mr-1" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                        </form>
                        {{-- <a href="{{ route('category.show', [$category->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a> --}}
                    </td>


                </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <h5 class="text-center">No Agents found.</h5>
                        </td>
                    </tr>

                @endif



                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>


@endsection
