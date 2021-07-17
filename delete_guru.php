<?php
  $id=$_GET['nip'];
  $query=mysqli_query($koneksi, "delete from data_guru where nip='$id'");

  if($query) {
    ?>
    <script language="javascript">
      document.location.href="?page=data_guru&status=1"
    </script>
    <?php
  } else {
    echo mysql_error();
  }

?>