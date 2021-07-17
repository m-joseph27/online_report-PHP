<?php
  $id=$_GET['id_pelajaran'];
  $query=mysqli_query($koneksi, "delete from setup_pelajaran where id_pelajaran='$id'");

  if($query) {
    ?>
    <script language="javascript">
      document.location.href="?page=setup_pelajaran&status=1"
    </script>
    <?php
  } else {
    echo mysql_error();
  }

?>