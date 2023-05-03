@extends('layouts.app')
@section('title', 'All Companies | YellowShare')
@section('content')
{{-- <div class="page_container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                               
                                    <div class="">
                                        <a href="{{ route('create-company') }}"> <input type="submit"
                                                value="Create User" class="btn btn-success btn-sm float-right"> </a>
                                       
                                    </div>
                               
                                
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <table class="table table-bordered table-striped " id="users_table">
                                <thead >
                                    <tr>
                                        <th >slno</th>
                                        <th >Name</th>
                                        
                                        <th >Action</th>

                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div> --}}
<div class="page_container">
    <div class="row">

                               
        <div class="">
            <a href="{{ route('create-company') }}"> <input type="submit"
                    value="Create Company" class="btn btn-success btn-sm float-right"> </a>
           
        </div>
   
    
    </div>
<table id="users_table" class="table table-striped table-bordered nowrap" style="width:100%">
    <thead >
        <tr>
            <th >slno</th>
            <th >Name</th>
            
            <th >Action</th>

        </tr>
    </thead>
    
</table>
</div>
<script>
        

    $(document).ready(function() {
        var table = $('#users_table').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            // dom: 'Blfrtip',
            //dom:"<'row'<'col-sm-12'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-4 mt-3'l><'col-sm-4 mt-2'i><'col-sm-4 mt-2'p>>",
            ajax: "{{ route('all-company') }}",
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5] // Column index which needs to export
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 5] // Column index which needs to export
                    }
                },
                {
                    extend: 'excel',
                }
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },

                {
                    data: 'company_name',
                    name: 'company_name'
                },
                
                
                
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    text: 'Copy'
                },
                {
                    extend: 'csv',
                    text: 'CSV'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF'
                },
                {
                    extend: 'print',
                    text: 'Print'
                }
            ]
        });
    });
//     function user_delete(id) {
//         console.log(id);
       
//      $(document).ready( () => {
//         $('#delete-modal').modal('show');
//     });
// $(document).on('click', '#delete-user', function(e) {






// $.ajax({
//     url: "{{ url('admin/users/delete') }}",
//     type: "POST",
//     data: {
//         "_token": "{{ csrf_token() }}",
//        "id":id,
      
//     },
//     datatype: 'json',
//     success: function(response) {
//         console.log(response);
        
//     },
// });








// });




//     }
</script>
@endsection