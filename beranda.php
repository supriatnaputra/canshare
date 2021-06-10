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
        <div class="text-white px-6 py-3 border-b-4 border-red-400">
            <a href="beranda.php">Beranda</a>
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
            <a href="sunting_profil.php"><?php echo $profil['nama_lengkap']?></a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 justify-items-center w-full min-h-screen">
        <div class="min-h-full col-span-2 w-full bg-white overflow-y-auto max-h-full">
            <div class="flex flex-row">
                <div>
                    <div class="h-11 w-11 rounded-3xl bg-red-400 hover:bg-gray-100 mt-20 ml-6" style="background-image: url('assets/941a1422d415f0755ee9371d19064a59.png');background-size: 50%; background-position: center;background-repeat: no-repeat;"></div>
                </div>
                <div>
                    <div class="bg-red-100 m-6 mt-20 p-6 rounded-3xl">
                        <form action="" method="post" enctype="multipart/form-data">
                            <textarea name="cerita" id="" rows="10" class="min-w-full bg-red-100" placeholder="Ceritakan kisahmu atau orang terdekat untuk melawan kanker..."></textarea>
                            <div class="flex flex-row justify-end">
                                <input type="file" name="" id="">
                                <input type="submit" class="h-11 w-11 rounded-3xl hover:bg-gray-100" style="background-image: url('assets/12cb71853998f7725e774da88755603f.png');background-size: 60%; background-position: center;background-repeat: no-repeat;" value="">
                            </div>
                        </form>
                    </div>
                    <?php
                        $posting = mysqli_query($con, "SELECT posting.*, user.nama_lengkap FROM posting 
                        INNER JOIN user ON posting.id_user = user.id_user ORDER BY tgl_posting DESC");
                        while($fPost = mysqli_fetch_array($posting)){
                    ?>
                    <div class="bg-red-100 mx-6 mt-4 p-6 rounded-3xl">
                        <div class="flex flex-row gap-3">
                            <div>
                                <div class="rounded-3xl bg-gray-500" style="width: 50px; height: 50px;"></div>
                            </div>
                            <div class="flex flex-col flex-shrink gap-y-3">
                                <b><?php echo $fPost['nama_lengkap']?></b>
                                <img src="<?php echo $fPost['gambar']?>" alt="" width="100%">
                                <p><?php echo $fPost['postingan']?></p>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="bg-red-200 rounded-3xl px-3 py-1 mt-3">
                                        <div class="flex flex-row justify-end">
                                            <input type="text" name="" id="" class="flex-grow bg-red-200 ml-2" placeholder="Berikan komentar dan semangat disini">
                                            <a href="" class="h-11 w-11 rounded-3xl bg-red-200 hover:bg-gray-100" style="background-image: url('assets/453b93497d6f891a0803d1dfdbc6c002.png');background-size: 60%; background-position: center;background-repeat: no-repeat;"></a>
                                            <input type="submit" class="h-11 w-11 rounded-3xl bg-red-200 hover:bg-gray-100" style="background-image: url('assets/12cb71853998f7725e774da88755603f.png');background-size: 60%; background-position: center;background-repeat: no-repeat;" value="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    

                    
                </div>
            </div>
        </div>
        <div class="min-h-full w-full bg-red-50">
            <div class="mt-20 mx-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="bg-gray-200 rounded-3xl px-3 py-1 mt-3">
                        <div class="flex flex-row justify-end">
                            <input type="text" name="" id="" class="flex-grow bg-gray-200 ml-2 placeholder-red-500" placeholder="Cari di Canshare">
                            <input type="submit" class="h-11 w-11 rounded-3xl bg-gray-200 hover:bg-gray-100" style="background-image: url('assets/5e186aa57d4edc3287597a34e06a2d8d.png');background-size: 60%; background-position: center;background-repeat: no-repeat;" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col mx-4 bg-gray-200 my-3 rounded-3xl p-4 px-7">
                <b class="text-red-500 text-xl">DONASI TERKINI</b>
                <div class="w-full bg-gray-300" style="height: 2px;"></div>
                <div class="my-3 flex flex-row">
                    <div class="h-11 w-11 rounded-xl bg-gray-400"></div>
                    <div class="ml-4 text-red-500">Bantu Dani melawan kanker usus</div>
                </div>
                <div class="my-3 flex flex-row">
                    <div class="h-11 w-11 rounded-xl bg-gray-400"></div>
                    <div class="ml-4 text-red-500">Bantu Dani melawan kanker usus</div>
                </div>
                <div class="my-3 flex flex-row">
                    <div class="h-11 w-11 rounded-xl bg-gray-400"></div>
                    <div class="ml-4 text-red-500">Bantu Dani melawan kanker usus</div>
                </div>
                <div class="my-3 flex flex-row">
                    <div class="h-11 w-11 rounded-xl bg-gray-400"></div>
                    <div class="ml-4 text-red-500">Bantu Dani melawan kanker usus</div>
                </div>
                <a href="" class="min-w-full bg-red-400 text-center text-white p-3 rounded-3xl">Selengkapnya</a>
            </div>
            <div class="flex flex-row justify-center gap-6 mt-6 text-gray-500">
                <a href="">About</a>
                <a href="">Terms and Condition</a>
                <a href="">Canshare 2020</a>
            </div>
        </div>
    </div>
</body>

</html>