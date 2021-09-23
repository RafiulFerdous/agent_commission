<!DOCTYPE html>
<html>
<head>
    <title>Multiple data send</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
    </script>
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body>





<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
    <br>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <form action="{{route('bill.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div>
           <div class="panel panel-header">

               <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Agent name">
                        </div></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="Patient_name" class="form-control" placeholder="Patient">
                        </div></div>

                </div>
                -->
            </div>





                       <div class="row">
                           <div class="col-sm-4 ml-1">

                    <div class="form-group">
                        <label>Select Agent</label>

                        <select name="agent" id="agent" class="form-control">
                            <option value="" style="display: none" selected>Select Agent</option>
                            @foreach($agents as $a)
                                <option value="{{ $a->id }}"> {{ $a->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">

                    <div class="form-group">
                        <label>Select Patient</label>
                        <select name="patient" id="patient" class="form-control">
                            <option value="" style="display: none" selected>Select patient</option>
                            @foreach($patients as $p)
                                <option value="{{ $p->id }}"> {{ $p->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>










            <div class="panel panel-footer" >
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>service Name</th>
                        <th>Description</th>
                        <th>rate</th>
                        <th>discount</th>
                        <th>Amount</th>
                        <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" name="service_name[]" class="form-control" required=""></td>
                        <td><input type="text" name="description[]" class="form-control"></td>
                        <td><input type="text" name="rate[]" class="form-control rate" required=""></td>
                        <td><input type="text" name="discount[]" class="form-control discount"></td>
                        <td><input type="text" name="amount[]" class="form-control amount"></td>
                        <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td>Total</td>
                        <td><b class="total"></b> </td>
                        <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                    </tr>
                    </tfoot>
                </table>
                <a href="{{route('bill.index')}}" class="btn btn-primary">Back to Bill List</a>
            </div>
        </div>
    </form>
    </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('tbody').delegate('.rate,.discount','keyup',function(){
        var tr=$(this).parent().parent();
        var rate=tr.find('.rate').val();
        var discount=tr.find('.discount').val();
        var amount=(rate/discount);
        tr.find('.amount').val(amount);
        total();
    });
    function total(){
        var total=0;
        $('.amount').each(function(i,e){
            var amount=$(this).val()-0;
            total +=amount;
        });
        $('.total').html(total+".00 tk");
    }
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var tr='<tr>'+
            '<td><input type="text" name="service_name[]" class="form-control" required=""></td>'+
            '<td><input type="text" name="description[]" class="form-control"></td>'+
            '<td><input type="text" name="rate[]" class="form-control rate" required=""></td>'+
            '<td><input type="text" name="discount[]" class="form-control discount"></td>'+
            ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
            '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
            '</tr>';
        $('tbody').append(tr);
    };
    $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
            $(this).parent().parent().remove();
        }

    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>
</html>
