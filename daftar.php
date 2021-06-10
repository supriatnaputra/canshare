<?php
    include 'config/koneksi.php';
    if(isset($_POST['daftar'])){
        if($_POST['password'] == $_POST['password_ulang']){
            $cek = mysqli_query($con, "SELECT id_user FROM user WHERE username = '$_POST[username]' && password = '$_POST[password]'");
            $numCek = mysqli_num_rows($cek);
            if($numCek > 0){
                echo "<script>alert('Maaf, Username sudah dipakai');document.location.href='daftar.php'</script>";
            }else{
                $query = mysqli_query($con, "INSERT INTO user VALUES ('','$_POST[nama]', '$_POST[username]', '$_POST[password]', '$_POST[email]'
                , '$_POST[kota]', '$_POST[status_kanker]', '$_POST[tgl_lahir]', '$_POST[no_hp]')");
                if($query){
                    echo "<script>alert('Daftar Berhasil');document.location.href='login.php'</script>";
                }else{
                    echo "<script>alert('Maaf, Daftar Gagal');document.location.href='daftar.php'</script>";
                }
            }
        }else{
            echo "<script>alert('Maaf, Password yang diketik ulang tidak sesuai');document.location.href='daftar.php'</script>";
        }
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
    <div class="grid justify-items-center w-full min-h-screen">
        <div class="grid self-center">
            <center><img src="assets/37ee585734f72e6bd2d3102f6994813b.png" width="75px" style="transform: translateY(35px);"></center>
            <div class="bg-red-100 shadow-lg overflow-hidden max-w-lg rounded-2xl self-center p-10">
                <form action="" method="post">
                    <div class="grid grid-cols-1 gap-4">
                        <b class="text-center mt-3 font-bold text-xl">Bergabung Bersama Canshare</b>
                        <input type="text" name="nama" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Nama Lengkapmu">
                        <input type="text" name="username" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Nama pengguna yang kamu inginkan">
                        <input type="email" name="email" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Email kamu">
                        <input type="text" name="no_hp" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Nomor HP kamu">
                        <input type="text" name="kota" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Kota asal kamu">
                        <label for="kota" class="text-red-500">Tanggal lahir kamu</label>
                        <input type="date" name="tgl_lahir" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Tanggal lahir kamu">
                        <input type="password" name="password" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Buat kata sandi(minimal 8 karakter)">
                        <input type="password" name="password_ulang" class="py-2 px-5 rounded-3xl placeholder-red-500 w-96" placeholder="Ulangi kata sandi">
                        <p class="text-red-500">Apakah kamu menderita kanker?</p>
                        <div>
                        <input type="radio" name="status_kanker" id="ya" value="Ya">
                        <label for="ya" class="text-red-500">Ya</label>
                        <input type="radio" name="status_kanker" id="tidak" value="Tidak">
                        <label for="tidak" class="text-red-500">Tidak</label>
                        </div>
                        <input type="submit" value="Daftar" name="daftar" class="py-2 px-5 rounded-3xl bg-red-400 text-white font-bold">
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