<?php 
include 'connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM pendaftar WHERE id = $id";
$query = mysqli_query($connect, $sql);

if ($query) {
    header('Location: ../index.php?status=deleteSuccess');
} else {
    header('Location: ../index.php?status=deleteFailed');
}
?>