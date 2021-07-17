<?php

include "conn.php";
error_reporting(E_ERROR | E_PARSE);

if(isset($_POST['submit'])){
	$nipUpdate=htmlentities((trim($_POST['nip'])));

	$nama_guru=ucwords(htmlentities($_POST['nama_guru']));
	$nip=htmlentities($_POST['nip']);
	$kelamin=htmlentities($_POST['kelamin']);
	$alamat_guru=ucwords(htmlentities($_POST['alamat_guru']));
	$telpon_guru=strtoupper(htmlentities($_POST['telpon_guru']));
	$username=htmlentities($_POST['username']);
	$password=md5(htmlentities($_POST['password']));
	
	$query=mysqli_query($koneksi,"update data_guru set nama_guru = '$nama_guru', nip = '$nip', kelamin = '$kelamin', alamat_guru = '$alamat_guru', telpon_guru = '$telpon_guru', username = '$username', password = '$password' where  nip = '$nipUpdate'");
	
	if($query){
		?><script language="javascript">
  document.location.href = "?page=data_guru&status=1";
</script><?php
	}else{
		?><script language="javascript">
  document.location.href = "?page=data_guru&status=2";
</script><?php
	}
	
}else{
	unset($_POST['submit']);
}


?>

<!--  start page-heading -->
<div id="page-heading">
  <h1>Update Data Guru</h1>
</div>
<!-- end page-heading -->

<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
  <tr>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
  </tr>
  <tr>
    <td id="tbl-border-left"></td>
    <td>
      <!--  start content-table-inner ...................................................................... START -->
      <div id="content-table-inner">

        <?php
			if($_GET['status']=='1'){
			?>

        <div id="message-green">
          <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td class="green-left">Alhamdulilah sesuatu banget, Data berhasil disimpan :)</td>
              <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif" alt="" /></a>
              </td>
            </tr>
          </table>
        </div>

        <?php
			}
			
			if($_GET['status']=='0'){
			?>

        <div id="message-red">
          <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td class="red-left">Yach data gagal di simpan, cape dech!</td>
              <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif" alt="" /></a></td>
            </tr>
          </table>
        </div>

        <?php
			}
			?>

      <?php 
        $nipUpdate=$_GET['nip'];
        $query=mysqli_query($koneksi, "select * from data_guru where nip = '$nipUpdate'");
        $row=mysqli_fetch_array($query);
      ?>

        <form action="?page=edit_guru" method="post">
        <input type="hidden" name="id_pelajaran" value="<?php echo $nipUpdate; ?>" />
          <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                <!--  start step-holder -->
                <!--  end step-holder -->
                <!-- start id-form -->
                <table border="0" cellpadding="0" cellspacing="0" id="id-form">
                  <tr>
                    <th valign="top">Nama Guru </th>
                    <td><input type="text" class="inp-form" name="nama_guru" value="<?php echo $row['nama_guru']; ?>" /></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th valign="top">NIP</th>
                    <td><input type="text" class="inp-form" name="nip" value="<?php echo $row['nip']; ?>" /></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th valign="top">Kelamin</th>
                    <td><select name="kelamin" class="styledselect_form_1">
                        <option value="laki-laki" <?php if($row['kelamin'] === 'laki-laki') { echo "selected='selected'" ; } ?> >Laki-laki</option>
                        <option value="perempuan" <?php if($row['kelamin'] === 'perempuan') { echo "selected='selected'" ; } ?> >Perempuan</option>
                      </select>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th valign="top">Alamat</th>
                    <td><textarea name="alamat_guru" class="form-textarea" value="<?php echo $row['alamat_guru']; ?>"></textarea></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th valign="top">Telpon </th>
                    <td><input type="text" class="inp-form" name="telpon_guru" value="<?php echo $row['telpon_guru']; ?>"/></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th valign="top">Username</th>
                    <td><input type="text" class="inp-form" name="username" value="<?php echo $row['username']; ?>" /></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th valign="top">Password</th>
                    <td><input type="password" class="inp-form" name="password" value="<?php echo $row['password']; ?>" /></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td valign="top"><input type="submit" name="submit" value="" class="form-submit" />
                      <input type="reset" value="" class="form-reset" />
                    </td>
                    <td></td>
                  </tr>
                </table>
                <!-- end id-form  -->
              </td>
              <td>
                <!--  start related-activities -->
              </td>
            </tr>
            <tr>
              <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
              <td></td>
            </tr>
          </table>
        </form>
        <div class="clear"></div>

      </div>
      <!--  end content-table-inner ............................................END  -->
    </td>
    <td id="tbl-border-right"></td>
  </tr>
  <tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
  </tr>
</table>