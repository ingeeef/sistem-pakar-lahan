<?php
// $koneksi = mysqli_connect("localhost", "root", "@Ingefatul100", "mamdani_mom_base");
$koneksi = mysqli_connect("localhost", "root", "", "mamdani_mom_base");

// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
