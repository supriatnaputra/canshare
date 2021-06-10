
<?php 
    if(isset($_GET['tayang'])){
        $sql = mysqli_query($con, "UPDATE donasi SET status_donasi = 'TAYANG' WHERE id_donasi = '$_GET[id]'");
    }
    if(isset($_GET['tutup'])){
        $sql = mysqli_query($con, "UPDATE donasi SET status_donasi = 'TUTUP' WHERE id_donasi = '$_GET[id]'");
    }
?>
<h2>Kelola Data Donasi</h2>
<table border="1">
    <tr>
        <tr>
            <th>No</th>
            <th>Nama Penderita</th>
            <th>Nama Pengaju</th>
            <th>No KTP Pengaju</th>
            <th>No HP Pengaju</th>
            <th>Kota Asal Penderita</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Target</th>
            <th>Tercapai</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php 
            $no = 0;
            $sql = mysqli_query($con, "SELECT donasi.*, user.nama_lengkap, user.no_telp FROM donasi INNER JOIN user ON donasi.id_user = 
            donasi.id_user");
            while($f=mysqli_fetch_array($sql)){
                $no++;
        ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $f['nama_penderita']?></td>
                <td><?php echo $f['nama_lengkap']?></td>
                <td><?php echo $f['no_ktp_pengaju']?></td>
                <td><?php echo $f['no_telp']?></td>
                <td><?php echo $f['kota_asal_penderita']?></td>
                <td><?php echo $f['judul']?></td>
                <td><?php echo $f['deskripsi']?></td>
                <td><?php echo tgl_indo($f['tanggal_post']) ?></td>
                <td><?php echo $f['target']?></td>
                <?php $ssq = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(jumlah) FROM transaksi WHERE id_donasi = '$f[id_donasi]'"));?>
                <td><?php echo $ssq[0]?></td>
                <td><img src="../assets/<?php echo $f['poto']?>" alt="" width="300px"></td>
                <td>
                    <?php 
                        if($f['status_donasi'] == "TAYANG"){
                    ?>
                        <a href="?menu&tutup&id=<?php echo $f['id_donasi']?>">TUTUP</a>
                    <?php }else{ ?>
                        <a href="?menu&tayang&id=<?php echo $f['id_donasi']?>">TAYANG</a>
                    <?php } ?>
                </td>

            </tr>
        <?php } ?>
    </tr>
</table>