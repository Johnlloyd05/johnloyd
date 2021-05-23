<?php
include 'dbclass.php';
$del = new database();
$del -> db_connect();
$del -> slect_db();
$del -> sql('DELETE FROM reg where user_id='.$_GET['id'].'');
$del -> query();
if(!$del->query()){?>
<script type="text/javascript">
	alert("deleted successfully");
	window.location = "admin.php";
</script>

<?php
}else{
	?>
	<script type="text/javascript">
	alert("deleted successfully");
	window.location = "tables.php";
</script>
<?php
}
?>