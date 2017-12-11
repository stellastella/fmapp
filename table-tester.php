<html>

<head>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/extensions/Responsive/js/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/extensions/TableTools/js/dataTables.tableTools.min.js"></script>


</head>
<body>
<?php
if(isset($_GET['table'])){
	$table_data = urldecode($_GET["table"]);
	echo $table_data;
}else{
	echo "no";
}

?>

<script>
 $(document).ready(function() {
        $('#maintable').DataTable({
                responsive: true
            }
        );
    });
</script>
</body>
</html>