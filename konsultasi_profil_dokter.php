<?php
    include 'config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));

    $profdok = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM dokter WHERE id_dokter = '$_GET[dokter]'"));
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
            <div class="text-white px-6 py-3 border-b-4 border-red-400">
            <a href="beranda.php">Beranda </a>
            </div>
            <div class="text-white px-6 py-3">
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
                <div>
                    <div class="flex flex-col">
                         <img src="assets/<?php echo $profdok['foto']?>" class="h-36 w-36 rounded-full">
                        <div class="mt-3 font-medium"><?php echo $profdok['nama_dokter']?></div>
                    </div>
                </div>
                <div class="h-full">
                    <div class="flex flex-col h-full">
                        <div>
                            <div class="flex flex-row">
                                <a href="konsultasi_profil_dokter.php?dokter=<?php echo $_GET['dokter']?>"><div class="bg-gray-100 px-10 py-3 ml-10 font-medium rounded-t-2xl">Profil</div></a>
                                <a href="konsultasi_kontak_dokter.php?dokter=<?php echo $_GET['dokter']?>"><div class="bg-gray-50 px-10 py-3 ml-3 font-medium rounded-t-2xl text-gray-400">Kontak</div></a>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-10 rounded-3xl h-full">
                            <p><?php echo $profdok['profil_singkat']?></p>
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