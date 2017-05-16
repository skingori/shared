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

<!-- Main content -->

<img src="../images/cs.png" style="alignment:left:auto;">


<!-- ........................................................................... -->

<?php include 'xf.php'?>

<!-- page script -->
<script>
    $(function () {
        $("#users").DataTable();
        $('#').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#damage').DataTable({
            "columns": [
                {"data": "damageid"},
                {"data": "damageby"},
                {"data": "mobilenumber"},
                {"data": "date_reg"},
                {"data": "damage"},
                {"data": "charges"},
                {"data": "otherdetails"}

            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: 'datatable/damages.php',
                type: 'POST'
            }
        });
    });
</script>
</head>


</body>
</html>
