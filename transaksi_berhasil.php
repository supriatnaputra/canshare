<?php
    include 'config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwind.css">
    <title>Beranda</title>
</head>

<body>
    <div class="w-full bg-red-300 fixed flex flex-row">
        <div class="flex flex-row">
            <div class="w-11 bg-red-300 hover:bg-red-400" style="background-image: url('assets/c506cd42d221531be073c743195d1e76.png');background-size: 80%; background-position: center;background-repeat: no-repeat;"></div>
            <div class="text-white px-6 py-3 ">
                <a href="beranda.php">Beranda</a>
            </div>
            <div class="text-white px-6 py-3 border-b-4 border-red-400">
                <a href="konsultasi.php">Konsultasi</a>
            </div>
            <div class="text-white px-6 py-3">
                <a href="donasi.php">Donasi</a>
            </div>
            <div class="text-white px-6 py-3">
                <a href="transaksi.php">Transaksi</a>
            </div>
        </div>
        <div class="text-white px-6 py-3 flex-grow">
            <div class="flex flex-row-reverse">
                <div class="bg-red-300 hover:bg-red-400 mx-2" style="background-image: url('assets/b3f27fe60f71499b5a6ec636ba7ccd15.png');background-size: 80%; background-position: center;background-repeat: no-repeat; width: 30px;"></div>
                <a href="sunting_profil.php"><?php echo $profil['nama_lengkap']; ?></a>
            </div>
        </div>
    </div>
    <div class="grid justify-items-center w-full min-h-screen overflow-y-auto">
        <div class="mt-20">
            <div class="flex flex-row gap-14 max-w-5xl h-full">
                <div class="h-full">
                    <div class="flex flex-col h-full">
                        <div>
                        <div class="flex flex-row justify-center mx-6 gap-x-3">
                                <a href="transaksi.php"><div class="bg-gray-200 px-10 py-3 font-medium rounded-t-2xl text-gray-400">Semua</div></a>
                                <a href="transaksi_berhasil.php"><div class="bg-red-100 px-10 py-3 font-medium rounded-t-2xl">Berhasil</div></a>
                                <a href="transaksi_gagal.php"><div class="bg-gray-200 px-10 py-3 font-medium rounded-t-2xl text-gray-400">Gagal</div></a>
                                <a href="transaksi_dalam_proses.php"><div class="bg-gray-200 px-10 py-3 font-medium rounded-t-2xl text-gray-400">Dalam Proses</div></a>
                            </div>
                        </div>
                        <div class="bg-red-100 p-10 rounded-3xl h-full">
                            <div class="flex flex-col gap-y-3">
                            <?php $s = mysqli_query($con, "SELECT transaksi.*, donasi.judul FROM transaksi
                            INNER JOIN donasi ON transaksi.id_donasi = donasi.id_donasi WHERE transaksi.id_user = '$_SESSION[id_user]' AND status_validasi = 'BERHASIL'");
                                while($fs = mysqli_fetch_array($s)){
                                    if($fs['status_validasi'] == "BERHASIL"){
                                        $warna = "Vector.png";
                                    }
                                    if($fs['status_validasi'] == "PENDING"){
                                        $warna = "Vector2.png";
                                    }
                                    if($fs['status_validasi'] == "GAGAL"){
                                        $warna = "Vector1.png";
                                    }
                            ?>
                                <div class="bg-white flex flex-row justify-between px-6 py-3 rounded-2xl">
                                    <div class="self-center font-medium"><?php echo $fs['judul']?></div>
                                    <div><img src="assets/<?php echo $warna?>" alt=""></div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-center gap-6 mt-14 text-gray-500">
            <a href="">About</a>
            <a href="">Terms and Condition</a>
            <a href="">Canshare 2020</a>
        </div>
    </div>
</body>

</html>