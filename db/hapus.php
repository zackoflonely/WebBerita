<?php
    require "koneksi.php";

    $id = $_GET["ID"];

    if($id){
        $query = "DELETE FROM Mahasiswa WHERE ID = '$id'";
        mysqli_query($conn,$query);
        echo "<script>
        alert('Berhasil Hapus');
        document.location.href='index.php';    
    </script>";
    }
?>