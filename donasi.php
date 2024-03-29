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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="bg-gray-200 rounded-3xl px-3 py-1 mt-14 max-w-2xl">
                        <div class="flex flex-row justify-end">
                            <input type="text" name="cari" id="" class="flex-grow bg-gray-200 ml-2 placeholder-red-500" placeholder="Cari di Canshare">
                            <input type="submit" name="search" class="h-11 w-11 rounded-3xl bg-gray-200 hover:bg-gray-100" style="background-image: url('assets/5e186aa57d4edc3287597a34e06a2d8d.png');background-size: 60%; background-position: center;background-repeat: no-repeat;" value="">
                        </div>
                    </div>
                </form>
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
        <div class="grid grid-cols-2 w-full px-6 max-w-6xl gap-6 mt-10">
            <?php
                if(isset($_POST['search'])){
                    $donasi = mysqli_query($con, "SELECT donasi.*, user.nama_lengkap FROM donasi 
                    INNER JOIN user ON donasi.id_user = user.id_user WHERE judul LIKE '%$_POST[cari]%' ORDER BY tanggal_post DESC ");
                }else{
                    $donasi = mysqli_query($con, "SELECT donasi.*, user.nama_lengkap FROM donasi 
                    INNER JOIN user ON donasi.id_user = user.id_user ORDER BY tanggal_post DESC ");
                }
                while($fDonasi = mysqli_fetch_array($donasi)){
            ?>
            <div>
                <div class="bg-red-200 w-full rounded-2xl p-6">
                    <div class="flex flex-row">
                        <div>
                        <img src="assets/<?php echo $fDonasi['poto']?>" class="w-14 h-14 bg-gray-400 rounded-2xl mr-5">
                        </div>
                        <div class="flex flex-col flex-grow">
                            <b class="text-xl"><?php echo $fDonasi['judul']?></b>
                            <p><?php echo $fDonasi['deskripsi']?></p>
                        </div>
                    </div>
                    <div class="grid justify-items-end">
                        <a href="donasi_detail.php?donasi=<?php echo $fDonasi['id_donasi']?>" class="text-blue-400">Lihat Detil ></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="flex flex-row justify-center gap-6 mt-14 text-gray-500">
                <a href="">About</a>
                <a href="">Terms and Condition</a>
                <a href="">Canshare 2020</a>
            </div>
    </div>
</body>

</html>