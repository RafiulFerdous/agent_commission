@extends('layout.admin_layout')

@section('title','Invoice')
@section('admin_content')




    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Invoice List</h3>
                <a href="#" class="btn btn-primary">Print Invoice</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Rate</th>
                    <th>Discount</th>
                    <th>Amount</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>


                        <tr>
                        @foreach($invoices as $key=>$invoice)
                            <tr>
                                <td>{{++$key}} </td>
                                <td>{{$invoice->services}} </td>
                                <td>{{$invoice->descriptions}} </td>
                                <td>{{$invoice->rates}} </td>
                                <td>{{$invoice->discounts}} </td>
                                <td>{{$invoice->amount}} </td>



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
