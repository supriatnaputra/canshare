<?php
    include 'config/koneksi.php';
    $profil = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'"));

    if(isset($_POST['sunting'])){
        $sql = mysqli_query($con, "UPDATE user SET nama_lengkap = '$_POST[nama]', username = '$_POST[username]',
        alamat_email = '$_POST[email]', kota_asal = '$_POST[kota]', tanggal_lahir = '$_POST[tgl]', no_telp = '$_POST[telp]'
        WHERE id_user = '$_SESSION[id_user]'");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwind.css">
    <title>Daftar</title>
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
                <a href="">Artaptr</a>
            </div>
        </div>
    </div>
    <div class="grid justify-items-center w-full min-h-screen">
        <div class="grid self-center">
            <div class="overflow-hidden max-w-lg rounded-2xl self-center p-10">
                <center>
                    <div class="h-36 w-36 bg-gray-300 rounded-full self-center m-5 my-14"></div>
                </center>
                <form action="" method="post">
                    <div class="grid grid-cols-1 gap-4">
                        <input type="text" name="nama" class="py-2 px-5 rounded-3xl placeholder-gray-500 bg-red-100 w-96" placeholder="Nama Lengkapmu" value="<?php echo $profil['nama_lengkap']?>">
                        <input type="text" name="username" class="py-2 px-5 rounded-3xl placeholder-gray-500 bg-red-100 w-96" placeholder="Nama pengguna yang kamu inginkan" value="<?php echo $profil['username']?>">
                        <input type="email" name="email" class="py-2 px-5 rounded-3xl placeholder-gray-500 bg-red-100 w-96" placeholder="Email kamu" value="<?php echo $profil['alamat_email']?>">
                        <input type="text" name="kota" class="py-2 px-5 rounded-3xl placeholder-gray-500 bg-red-100 w-96" placeholder="Kota asal kamu"value="<?php echo $profil['kota_asal']?>">
                        <input type="text" name="telp" class="py-2 px-5 rounded-3xl placeholder-gray-500 bg-red-100 w-96" placeholder="Kota asal kamu"value="<?php echo $profil['no_telp']?>">
                        <label for="kota" class="text-red-500">Tanggal lahir kamu</label>
                        <input type="date" name="tgl" class="py-2 px-5 rounded-3xl placeholder-gray-500 bg-red-100 w-96" placeholder="Tanggal lahir kamu" value="<?php echo $profil['tanggal_lahir']?>">
                        
                        <input type="submit" name="sunting" value="Sunting" class="py-2 px-5 rounded-3xl bg-red-400 text-white font-bold">
                    </div>
                </form>
            </div>
            <div class="flex flex-row justify-center gap-6 mt-14 text-gray-500">
                <a href="">About</a>
                <a href="">Terms and Condition</a>
                <a href="">Canshare 2020</a>
            </div>
        </div>
    </div>
</body>

</html>