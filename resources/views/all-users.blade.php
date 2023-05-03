@extends('layouts.app')
@section('title', 'All users | YellowShare')
@section('content')


<div class="page_container">
    
<table id="users_table" class="table table-striped table-bordered nowrap" style="width:100%">
    <thead >
        <tr>
            <th >#</th>
            <th >Name</th>
            <th >Email</th>
           
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
            ajax: "{{ route('all-users') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
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
{{-- <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script> --}}
{{-- $(function(){   
    $(".select2").select2()    
    $(".select2bs4").select2({
      theme: "bootstrap4"
    });	
}); --}}