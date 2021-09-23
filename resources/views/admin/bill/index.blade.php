@extends('layout.admin_layout')

@section('title','Manage Agent')
@section('admin_content')



    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Bill List</h3>
                <a href="{{ route('bill.create') }}" class="btn btn-primary">Generate Bill</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Agent Name</th>
                    <th>Patient Name</th>
                    <th>Bill Id</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                @foreach($bills as $key=>$data)
                    <tr><td>{{++$key}} </td>
                        <?php

                        $names = \App\Models\Agent::find($key);
                        $patient_names = \App\Models\Patient::find($key);

                        ?>
                        <td>{{ !empty($names->name)?$names->name:"Not Available" }} </td>
                        <td>{{ !empty($patient_names->name)?$patient_names->name:"Not Available" }} </td>
                        <td><a href="/invoices/{{$data->id}}">{{$data->id}} </a></td>


                        <td class="d-flex">
                            <form action="#" class="mr-1" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                            </form>
                            <a href="{{url('finalinvoice/'.$data->id)}}" rel="noopener" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            {{-- <a href="{{ route('category.show', [$category->id]) }}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a> --}}
                        </td>
                    </tr>



                @endforeach



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
