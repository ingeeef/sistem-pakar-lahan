<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan user dan pass yang sesuai
$data = mysqli_query($koneksi, "select * from tb_admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	$data2 = mysqli_fetch_assoc($data);

	if($data2['level']=="admin"){

	$_SESSION['username'] = $username;
	$_SESSION['level'] = "admin";
	$_SESSION['status'] = "login";
	$jenis = mysqli_query($koneksi, "select * from tb_jenis where status = 1");
	if (mysqli_num_rows($jenis) > 0) {
		$arr_jenis = array();
		while ($data = mysqli_fetch_assoc($jenis)) {
			array_push($arr_jenis, $data);
		}

		$_SESSION['jenis'] = $arr_jenis[0]['database'];
	}  else {
		$jenis = array();
	}
	header("location:admin.php");

}else if($data2['level']=="user"){
	$_SESSION['username'] = $username;
	$_SESSION['level'] = "user";
	$_SESSION['status'] = "login";
	$jenis = mysqli_query($koneksi, "select * from tb_jenis where status = 1");
	if (mysqli_num_rows($jenis) > 0) {
		$arr_jenis = array();
		while ($data = mysqli_fetch_assoc($jenis)) {
			array_push($arr_jenis, $data);
		}

		$_SESSION['jenis'] = $arr_jenis[0]['database'];
	} else {
		$jenis = array();
	}
	header("location:user.php");
}
else{
 
	// alihkan ke halaman login kembali
	header("location:index.php?pesan=gagal");
	}	
}


