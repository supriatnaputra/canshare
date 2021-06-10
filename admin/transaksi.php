
<?php 
    if(isset($_GET['berhasil'])){
        $sql = mysqli_query($con, "UPDATE transaksi SET status_validasi = 'BERHASIL' WHERE id_transaksi = '$_GET[id]'");
    }
    if(isset($_GET['batal'])){
        $sql = mysqli_query($con, "UPDATE transaksi SET status_validasi = 'GAGAL' WHERE id_transaksi = '$_GET[id]'");
    }
?>
<h2>Kelola Data Transaksi</h2>
<table border="1">
    <tr>
        <tr>
            <th>No</th>
            <th>Judul Donasi</th>
            <th>Jumlah</th>
            <th>Nama User</th>
            <th>No HP</th>
            <th>No Rekening</th>
            <th>Bukti</th>
           
            <th>Status</th>
        </tr>
        <?php 
            $no = 0;
            $sql = mysqli_query($con, "SELECT transaksi.*, donasi.judul, user.nama_lengkap, user.no_telp FROM transaksi INNER JOIN donasi 
            ON transaksi.id_donasi = donasi.id_donasi INNER JOIN user ON donasi.id_user = user.id_user");
            while($f=mysqli_fetch_array($sql)){
                $no++;
        ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $f['judul']?></td>
                <td><?php echo $f['jumlah']?></td>
                <td><?php echo $f['nama_lengkap']?></td>
                <td><?php echo $f['no_telp']?></td>
                <td><?php echo $f['no_rek']?></td>
                <td><img src="../assets/<?php echo $f['bukti']?>" alt="" width="300px"></td>
                <td>
                    <?php 
                        if($f['status_validasi'] == "BERHASIL"){
                    ?>
                        <a href="?menu&batal&id=<?php echo $f['id_transaksi']?>">GAGAL</a>
                    <?php }elseif($f['status_validasi'] == "PENDING"){ ?>
                        <a href="?menu&berhasil&id=<?php echo $f['id_donasi']?>">BERHASIL</a> || 
                        <a href="?menu&batal&id=<?php echo $f['id_donasi']?>">BATAL</a>
                    <?php }else{ ?>
                        <a href="?menu&berhasil&id=<?php echo $f['id_donasi']?>">BERHASIL</a>
                        <?php } ?>
                </td>

            </tr>
        <?php } ?>
    </tr>
</table>