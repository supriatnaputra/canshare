<?php
    include 'config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));

    $dons = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM donasi WHERE id_donasi = '$_GET[donasi]'"));
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
            <div class="text-white px-6 py-3">
                <a href="konsultasi.php">Konsultasi</a>
            </div>
            <div class="text-white px-6 py-3 border-b-4 border-red-400">
                <a href="donasi.php">Donasi</a>
            </div>
            <div class="text-white px-6 py-3">
                <a href="teransaksi.php">Transaksi</a>
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
        <div class="w-full ">
            <div class="bg-red-50 p-4 w-full grid justify-items-center">
                
                <div class="absolute float-right right-3">
                    <a href="donasi_ajukan.php">
                        <div class="bg-red-300 rounded-3xl px-3 py-1 mt-14 max-w-2xl">
                            <div class="flex flex-row justify-end content-center">
                                <div class="h-11 w-11 rounded-3xl" style="background-image: url('assets/941a1422d415f0755ee9371d19064a59.png');background-size: 60%; background-position: center;background-repeat: no-repeat;"></div>
                                <div class="flex-grow text-white ml-2 self-center">Ajukan Donasi</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="grid w-full px-6 max-w-6xl gap-6 mt-10">
            <div class="bg-gray-100 p-10 rounded-3xl h-full">
                <center><b class="text-center text-4xl"><?php echo $dons['judul']?></b></center>
                <center><img src="assets/<?php echo $dons['poto']?>" class="m-10"></center>
                <p><?php echo $dons['deskripsi']?></p>
                <a href="donasi_konfirmasi.php?donasi=<?php echo $_GET['donasi']?>">
                <center><div class="py-2 px-5 rounded-3xl bg-red-400 text-white w-full text-center mt-20 max-w-3xl justify-self-center">Donasi Sekarang</div></center>
                </a>
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