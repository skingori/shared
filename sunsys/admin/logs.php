<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
    switch($_SESSION['category']) {

        case 1:
            header('location:../index.php');//redirect to  page
            break;

        case 2:
            header('location:../index.php');//redirect to  page
            break;

        case 3:
            header('location:../index.php');//redirect to  page
            break;

    }
}else
{

    header('Location:index.php');
}

?>


<?php include 'xh.php'?>
    <!-- Info boxes -->
    <!-- Your Page Content Here ..................................................................-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <table cellpadding="1" cellspacing="1" id="users" width="100%" class="table table-bordered table-hover ">
        <thead>
        <tr style="background-color: #b3d271">
            <th>ID</th>
            <th>Activity</th>
            <th>Activity by</th>
            <th>Date</th>

        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Activity</th>
            <th>Activity by</th>
            <th>Date</th>
        </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#users').DataTable({
                "columns": [
                    {"data": "logsid"},
                    {"data": "activity"},
                    {"data": "activity_by"},
                    {"data": "date"},
                ],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: 'datatable/logs.php',
                    type: 'POST'
                }
            });
        });
    </script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    <!-- ........................................................................... -->

<?php include 'xf.php'?>