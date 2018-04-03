    
@extends ('admin.layouts.layout')
@section('content')



     <!-- Latest compiled and minified CSS 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">





              <table id="users-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>user id</th>
                  <th>name</th>
                  <th>email </th>

                </tr>
                </thead>


              </table>
   
















 <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script type="text/javascript">
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'http://localhost/sf/blog/public/adminpanel/users/data',
            columns : [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
            ],
            pageLength: 5,
        });
    });
</script>



@endsection

