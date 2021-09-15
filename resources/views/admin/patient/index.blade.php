@extends('layout.admin_layout')
@section('title','Manage Patient')
@section('admin_content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Patient List</h3>
                <a href="{{ route('patient.create') }}" class="btn btn-primary">Add Patient</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Patient Name</th>
                    <th>Patient Age</th>
                    <th>Sex</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Reference Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($patients->count())
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{$patient->id}}</td>
                            <td>{{$patient->name}}</td>
                            <td>
                                {{$patient->age}}
                            </td>
                            <td>
                                {{$patient->sex}}
                            </td>
                            <td>
                                {{$patient->phone}}
                            </td>
                            <td>
                                {{$patient->address}}
                            </td>
                            <td>
                                {{$patient->agent->name}}
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
                        <td colspan="7">
                            <h5 class="text-center">No Patient found.</h5>
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
