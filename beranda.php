<?php 
    include 'config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));
    $tgl_skrg =  date('Y-m-d H:i:s');
    if(isset($_POST['post'])){
        $ekstensi_diperbolehkan	= array('png','jpg');
        $nama = $_FILES['poto']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['poto']['size'];
        $file_tmp = $_FILES['poto']['tmp_name'];
        move_uploaded_file($file_tmp, 'assets/'.$nama);

        $sql = mysqli_query($con, "INSERT INTO posting VALUES ('', '$tgl_skrg', '$_SESSION[id_user]','$_POST[cerita]', '$nama')");
        if($sql){
            echo "<script>alert('Berhasil Memposting');document.location.href='beranda.php'</script>";
        }else{
            echo "<script>alert('Maaf, Gagal Posting');document.location.href='beranda.php'</script>";
        }
    }

    if(isset($_GET['batalSuka'])){
        $sql = mysqli_query($con, "DELETE FROM respon WHERE id_posting = '$_GET[idPost]' AND jenis = 'LIKE' AND id_user = '$_SESSION[id_user]'");
        echo "<script>document.location.href='beranda.php'</script>";
    }
    if(isset($_GET['suka'])){
        $sql = mysqli_query($con, "INSERT INTO respon VALUES ('', '$_GET[idPost]', 'LIKE', '', '$_SESSION[id_user]')");
        echo "<script>document.location.href='beranda.php'</script>";
    }

    
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
                <div class="w-full">
                    <div class="bg-red-100 m-6 mt-20 p-6 rounded-3xl">
                        <form action="" method="post" enctype="multipart/form-data">
                            <textarea name="cerita" id="" rows="10" class="min-w-full bg-red-100" placeholder="Ceritakan kisahmu atau orang terdekat untuk melawan kanker..."></textarea>
                            <div class="flex flex-row justify-end">
                                <input type="file" name="poto" id="">
                                <input type="submit" name="post" class="h-11 w-11 rounded-3xl hover:bg-gray-100" style="background-image: url('assets/12cb71853998f7725e774da88755603f.png');background-size: 60%; background-position: center;background-repeat: no-repeat;" value="">
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
                            <div class="flex flex-col flex-shrink gap-y-3 w-full">
                                <b><?php echo $fPost['nama_lengkap']?></b>
                                <img src="<?php echo "assets/".$fPost['gambar']?>" alt="" class="max-w-md">
                                <p><?php echo $fPost['postingan']?></p>
                                <br>
                                <?php $like = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS suka FROM respon WHERE jenis = 'LIKE' AND id_posting = '$fPost[id_posting]'")); ?>
                                <p><?php echo $like['suka'] ?> Suka</p>
                                <?php 
                                    $komen = mysqli_query($con, "SELECT respon.*, user.nama_lengkap FROM respon INNER JOIN user ON respon.id_user = user.id_user WHERE jenis = 'KOMENTAR' AND id_posting = '$fPost[id_posting]'");
                                    $nKomen = mysqli_num_rows($komen);
                                    if($nKomen > 0){
                                    while($fKomen = mysqli_fetch_array($komen)){
                                ?>
                                    
                                    <div class="">
                                        <?php echo "<b>".$fKomen['nama_lengkap']."</b>".' : '.$fKomen['komentar'] ?>
                                    </div>

                                <?php } }else {} ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="bg-red-200 rounded-3xl px-3 py-1 mt-3">
                                        <div class="flex flex-row justify-end">
                                            <input type="text" name="komen_<?php echo $fPost['id_posting']?>" id="" class="flex-grow bg-red-200 ml-2" placeholder="Berikan komentar dan semangat disini">
                                            <?php $gw = mysqli_num_rows(mysqli_query($con, "SELECT * FROM respon WHERE jenis = 'LIKE' AND id_posting = '$fPost[id_posting]' AND id_user = '$_SESSION[id_user]'")); ?>
                                            <?php if($gw > 0) { ?>
                                            <a href="beranda.php?batalSuka&idPost=<?php echo $fPost['id_posting']?>" class="h-11 w-11 rounded-3xl bg-gray-100 hover:bg-gray-100" style="background-image: url('assets/453b93497d6f891a0803d1dfdbc6c002.png');background-size: 60%; background-position: center;background-repeat: no-repeat;"></a>
                                            <?php } else { ?>
                                            <a href="beranda.php?suka&idPost=<?php echo $fPost['id_posting']?>" class="h-11 w-11 rounded-3xl bg-red-200 hover:bg-gray-100" style="background-image: url('assets/453b93497d6f891a0803d1dfdbc6c002.png');background-size: 60%; background-position: center;background-repeat: no-repeat;"></a>
                                            <?php } ?>
                                            <input type="submit" name="kom_<?php echo $fPost['id_posting']?>" class="h-11 w-11 rounded-3xl bg-red-200 hover:bg-gray-100" style="background-image: url('assets/12cb71853998f7725e774da88755603f.png');background-size: 60%; background-position: center;background-repeat: no-repeat;" value="">
                                           
                                            <?php 
                                                $fPosts = $fPost['id_posting'];
                                                @$ngkom = $_POST['kom_'.$fPosts];
                                                @$tngkom = $_POST['komen_'.$fPosts];
                                                if(isset($ngkom)){
                                                    $sql = mysqli_query($con, "INSERT INTO respon VALUES ('', '$fPost[id_posting]', 'KOMENTAR', '$tngkom', '$_SESSION[id_user]')");
                                                    echo "<script>document.location.href='beranda.php'</script>";
                                                }?>
        
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
                            <input type="text" name="cari" id="" class="flex-grow bg-gray-200 ml-2 placeholder-red-500" placeholder="Cari di Canshare">
                            <input type="submit" name="search" class="h-11 w-11 rounded-3xl bg-gray-200 hover:bg-gray-100" style="background-image: url('assets/5e186aa57d4edc3287597a34e06a2d8d.png');background-size: 60%; background-position: center;background-repeat: no-repeat;" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col mx-4 bg-gray-200 my-3 rounded-3xl p-4 px-7">
                <b class="text-red-500 text-xl">DONASI TERKINI</b>
                <div class="w-full bg-gray-300" style="height: 2px;"></div>
                <?php
                    if(isset($_POST['search'])){
                        $donasi = mysqli_query($con, "SELECT donasi.*, user.nama_lengkap FROM donasi 
                        INNER JOIN user ON donasi.id_user = user.id_user WHERE judul LIKE '%$_POST[cari]%' ORDER BY tanggal_post DESC LIMIT 5");
                    }else{
                        $donasi = mysqli_query($con, "SELECT donasi.*, user.nama_lengkap FROM donasi 
                        INNER JOIN user ON donasi.id_user = user.id_user ORDER BY tanggal_post DESC LIMIT 5");
                    }
                    while($fDonasi = mysqli_fetch_array($donasi)){
                ?>
                <div class="my-3 flex flex-row">
                    <div class="h-11 w-11 rounded-xl bg-gray-400"></div>
                    <div class="ml-4 text-red-500"><?php echo $fDonasi['judul']?></div>
                </div>
                <?php }?>
                <a href="donasi.php" class="min-w-full bg-red-400 text-center text-white p-3 rounded-3xl">Selengkapnya</a>
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