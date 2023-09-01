<?php

$conn = mysqli_connect("localhost", "root", "", "sewarumah");

function registrasi($data)
{
    global $conn;

    $namalengkap = ($data["namalengkap"]);
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $nohp = ($data["nohp"]);

    //cek email sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('email sudah terdaftar')
            </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password != $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$namalengkap', '$email', '$password', '$nohp')");

    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;

    $nomorrumah = ($data["nomorrumah"]);
    $Deskripsi = ($data["Deskripsi"]);
    $status = ($data["status"]);
    $harga = ($data["harga"]);

    //upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }
    //cek nomor rumah sudah ada atau belum
    $result = mysqli_query($conn, "SELECT nomorrumah FROM rumah WHERE nomorrumah = '$nomorrumah'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Nomor Rumah Sudah Ada!')
            </script>";
        return false;
    }

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO rumah VALUES ('', '', '$nomorrumah', '$Deskripsi', '$status', '$harga', '$foto' )");

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
    $ekstensifoto = explode('.', $namafile); //memecah nama file
    $ekstensifoto = strtolower(end($ekstensifoto));


    if (!in_array($ekstensifoto, $ekstensifotovalid)) { //cek ekstensi ada atau ga
        echo "<script>
       alert('File yang diinput tidak sesuai!')
       </script>";
        return false;
    }
    if ($ukuranfile > 5000000) {
        echo "<script>
                alert('Ukuran file terlalu besar!')
            </script>";
        return false;
    }
    //lolos semua
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensifoto;
    move_uploaded_file($tmpname, 'images/upload/' . $namafilebaru);
    return ($namafilebaru);
}

function upload1()
{
    $namafile = $_FILES['bukti']['name'];
    $ukuranfile = $_FILES['bukti']['size'];
    $error = $_FILES['bukti']['error'];
    $tmpname = $_FILES['bukti']['tmp_name'];

    $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
    $ekstensifoto = explode('.', $namafile); //memecah nama file
    $ekstensifoto = strtolower(end($ekstensifoto));


    if (!in_array($ekstensifoto, $ekstensifotovalid)) { //cek ekstensi ada atau ga
        echo "<script>
       alert('File yang diinput tidak sesuai!')
       </script>";
        return false;
    }
    if ($ukuranfile > 5000000) {
        echo "<script>
                alert('Ukuran file terlalu besar!')
            </script>";
        return false;
    }
    //lolos semua
    //generate nama baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensifoto;
    move_uploaded_file($tmpname, 'images/bukti/' . $namafilebaru);
    return ($namafilebaru);
}

function ubah($data)
{
    global $conn;

    $idrumah = $_POST['idrumah'];
    $nomorrumah = $_POST['nomorrumah'];
    $Deskripsi = $_POST['Deskripsi'];
    $status_rumah = $_POST['status_rumah'];
    $harga = $_POST['harga'];
    $fotolama = $_POST['fotolama'];


    if ($_FILES['foto']['error'] == 4) //tidak input gambar baru
    {
        $foto = $fotolama;
    } else {
        $foto = upload();
    }

    $SQL = mysqli_query($conn, "UPDATE rumah SET 
		
		nomorrumah = '$nomorrumah',
		Deskripsi = '$Deskripsi',
        status_rumah = '$status_rumah',
        harga = '$harga',
        foto = '$foto' WHERE idrumah='$idrumah'");



    if ($status_rumah == "Tersedia, Tidak Tersedia") {
        $booking = mysqli_query($conn, "DELETE FROM booking WHERE idrumah='$idrumah'");
    }
    return mysqli_affected_rows($conn);
}

function booking($data)
{
    global $conn;

    $idbooking = ($data["idbooking"]);
    $idrumah = ($data["rumah"]);
    $iduser = ($data["iduser"]);
    $tanggalbooking = ($data["tanggalbooking"]);
    $tanggalhuni = ($data["tanggalhuni"]);

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO booking VALUES ('', '$idrumah', '$iduser', '$tanggalbooking', '$tanggalhuni')");
    mysqli_query($conn, "UPDATE rumah SET `status_rumah`='Tidak Tersedia', `iduser` = '$iduser' WHERE `idrumah`='$idrumah'");

    return mysqli_affected_rows($conn);
}

function bayar($data)
{
    global $conn;

    $idrumah = ($data["rumah"]);
    $iduser = ($data["iduser"]);
    $tanggalpembayaran = ($data["tanggalpembayaran"]);
    $nominal = ($data["nominal"]);

    //upload gambar
    $bukti = upload1();
    if (!$bukti) {
        return false;
    }

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO bayar VALUES ('', '$idrumah', '$iduser', '$tanggalpembayaran', '$nominal', '$bukti', '', 'MENUNGGU KONFIRMASI')");

    return mysqli_affected_rows($conn);
}


function keluhan($data)
{
    global $conn;

    $iduser = ($data["iduser"]);
    $idrumah = ($data["rumah"]);
    $isi = ($data["isi"]);


    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO keluhanpa1 VALUES ('', '$iduser', '$idrumah', '$isi')");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $idbayar = $_POST['idbayar'];
    $tanggalselesai = $_POST['tanggalselesai'];
    $status = $_POST['status'];


    $SQL = mysqli_query($conn, "UPDATE bayar SET 
		
		tanggalselesai = '$tanggalselesai',
        status = '$status'
        WHERE idbayar='$idbayar'");


    return mysqli_affected_rows($conn);
}

function update2($data)
{
    global $conn;
    $idbayar = $_POST['idbayar'];
    $tanggalselesai = $_POST['tanggalselesai'];
    $status = $_POST['status'];


    $SQL = mysqli_query($conn, "UPDATE bayar SET 
		
		tanggalselesai = '$tanggalselesai',
        status = '$status'
        WHERE idbayar='$idbayar'");


    return mysqli_affected_rows($conn);
}
