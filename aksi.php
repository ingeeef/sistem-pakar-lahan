<?php
require_once 'functions.php';

if ($mod == 'login') {
    $username = esc_field($_POST['username']);
    $password = esc_field($_POST['password']);

    $row = $db->get_row("SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
    if ($row) {
        $_SESSION['login'] = $row->username;
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi usernamename dan password.");
    }
} else if ($mod == 'password') {
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $password3 = $_POST['password3'];

    $row = $db->get_row("SELECT * FROM tb_admin WHERE username='$_SESSION[login]' AND password='$password1'");

    if ($password1 == '' || $password2 == '' || $password3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('password lama salah.');
    elseif ($password2 != $password3)
        print_msg('password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_admin SET password='$password2' WHERE username='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login']);
    $helper = array_keys($_SESSION);
    foreach ($helper as $key) {
        unset($_SESSION[$key]);
    }
    header("location:index.php?m=login");
}

/** ALTERNATIF **/
elseif ($mod == 'alternatif_tambah') {
    $kode_alternatif = $_POST['kode_alternatif'];
    $nama_alternatif = $_POST['nama_alternatif'];
    $nilai = $_POST['nilai'];

    if ($kode_alternatif == '' || $nama_alternatif == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode_alternatif'"))
        print_msg("Kode_alternatif sudah ada!");
    else {
        if ($koneksi) {
            $jenis = $koneksi->query("SELECT * FROM tb_jenis");
            while ($raw = $jenis->fetch_assoc()) {
                $dbs = mysqli_connect('localhost', 'root', '', $raw['database']);
                $dbs->query("INSERT INTO tb_alternatif(kode_alternatif, nama_alternatif) VALUES ('$kode_alternatif', '$nama_alternatif')");
                foreach ($nilai as $key => $val) {
                    $val *= 1;
                    $dbs->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, nilai) VALUES ('$kode_alternatif', '$key', $val)");
                }
            }
        } else {
            echo "!oke";
        }


        redirect_js("admin.php?m=alternatif");
    }
} elseif ($mod == 'alternatif_ubah') {
    $nama_alternatif = $_POST['nama_alternatif'];
    $nilai = $_POST['nilai'];

    if ($nama_alternatif == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama_alternatif' WHERE kode_alternatif='$_GET[ID]'");
        foreach ($nilai as $key => $val)
            $db->query("UPDATE tb_rel_alternatif SET nilai='$val' WHERE ID='$key'");
        redirect_js("admin.php?m=alternatif");
    }
} elseif ($act == 'alternatif_hapus') {
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif='$_GET[ID]'");
    header("location:admin.php?m=alternatif");
}

/** kriteria */
elseif ($mod == 'kriteria_tambah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $batas_bawah = $_POST['batas_bawah'];
    $batas_atas = $_POST['batas_atas'];

    if (!$kode_kriteria || !$nama_kriteria || $batas_bawah == '' || $batas_atas == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria'"))
        print_msg("Kode sudah ada!");
    elseif ($batas_bawah < 0 || $batas_atas < 0)
        print_msg("Batas minimal 0!");
    elseif ($batas_bawah >= $batas_atas)
        print_msg("Batas atas harus lebih besar dari batas bawah!");
    else {
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria, batas_bawah, batas_atas) VALUES ('$kode_kriteria', '$nama_kriteria', '$batas_bawah', '$batas_atas')");
        $db->query("INSERT INTO tb_rel_alternatif (kode_alternatif, kode_kriteria) SELECT kode_alternatif, '$kode_kriteria' FROM tb_alternatif");
        redirect_js("admin.php?m=kriteria");
    }
} else if ($mod == 'kriteria_ubah') {
    $nama_kriteria = $_POST['nama_kriteria'];
    $batas_bawah = $_POST['batas_bawah'];
    $batas_atas = $_POST['batas_atas'];

    if (!$nama_kriteria  || $batas_bawah == '' || $batas_atas == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($batas_bawah < 0 || $batas_atas < 0)
        print_msg("Batas bawah minimal 0!");
    elseif ($batas_bawah >= $batas_atas)
        print_msg("Batas atas harus lebih besar dari batas bawah!");
    else {
        $db->query("UPDATE tb_kriteria 
            SET nama_kriteria='$nama_kriteria', batas_bawah='$batas_bawah', batas_atas='$batas_atas'
            WHERE kode_kriteria='$_GET[ID]'");
        redirect_js("admin.php?m=kriteria");
    }
} else if ($act == 'kriteria_hapus') {
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_aturan WHERE kode_kriteria='$_GET[ID]'");
    header("location:admin.php?m=kriteria");
}

/** RELASI ALTERNATIF */
else if ($act == 'rel_alternatif_ubah') {
    foreach ($_POST as $key => $value) {
        $ID = str_replace('ID-', '', $key);
        $db->query("UPDATE tb_rel_alternatif SET nilai='$value' WHERE ID='$ID'");
    }
    header("location:admin.php?m=rel_alternatif");
} else if ($mod == 'kriteria_himpunan') {
    if ($_POST['tambah_himpunan']) {
        $kode_himpunan = $_POST['kode_himpunan'];
        $nama_himpunan = $_POST['nama_himpunan'];
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $n3 = $_POST['n3'];
        $n4 = $_POST['n4'];

        if ($kode_himpunan == '' || $nama_himpunan == '' || $n1 == '' || $n2 == '' || $n3 == '' || $n4 == '') {
            print_msg("Semua Field harus diisi!");
        } else {
            $db->query("INSERT INTO tb_himpunan (kode_himpunan, kode_kriteria, nama_himpunan, n1, n2, n3, n4)
                VALUES ('$kode_himpunan', '$_GET[ID]', '$nama_himpunan', '$n1', '$n2', '$n3', '$n4' )");
            print_msg('Himpunan berhasil ditambah!', 'success');
        }
    } else if ($_POST['simpan_himpunan']) {
        $data = $_POST['data'];
        foreach ($data as $key => $val) {
            $db->query("UPDATE tb_himpunan SET nama_himpunan='$val[nama_himpunan]', n1='$val[n1]', n2='$val[n2]', n3='$val[n3]', n4='$val[n4]' WHERE kode_himpunan='$key'");
        }
        print_msg('Himpunan berhasil disimpan!', 'success');
    }
} else if ($mod == 'himpunan_hapus') {
    $db->query("DELETE FROM tb_himpunan WHERE kode_himpunan='$_GET[ID]'");
    header("location:admin.php?m=kriteria_himpunan&ID=$_GET[kode_kriteria]");
} else if ($act == 'aturan_hapus') {
    $db->query("DELETE FROM tb_aturan WHERE no_aturan='$_GET[ID]'");
    header("location:admin.php?m=aturan");
}
