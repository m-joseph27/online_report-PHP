<?php
  $id=$_GET['nis'];
  $query=mysqli_query($koneksi, "delete from data_siswa where nis='$id'");

  if($query) {
    ?>
    <script language="javascript">
      document.location.href="?page=data_siswa&status=1"
    </script>
    <?php
  } else {
    echo mysql_error();
  }

?>