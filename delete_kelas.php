<?php
  $id=$_GET['id_kelas'];
  $query=mysqli_query($koneksi, "delete from setup_kelas where id_kelas='$id'");

  if($query) {
    ?>
    <script language="javascript">
      document.location.href="?page=setup_kelas&status=1"
    </script>
    <?php
  } else {
    echo mysql_error();
  }

?>