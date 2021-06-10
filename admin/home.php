<?php
    include '../config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM admin WHERE id_admin = '$_SESSION[id_user]'"));
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
     
?>

<h1>Halo selamat Datang <?php echo $profil['nama_pengguna']?></h1>

<ul>
    <li><a href="?menu=donasi">Donasi</a></li>
    <li><a href="?menu=transaksi">Transaksi</a></li>
</ul>

<?php
    switch (@$_GET['menu']) {
        case 'donasi':
            include 'donasi.php';
            break;
        case 'transaksi':
            include 'transaksi.php';
            break;
        default:
            include 'donasi.php';
        break;
    }
?>