<div class="page-header">
    <h1>Tambah Alternatif</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <form method="post">
            <input type="hidden" name="tambah" value="true">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_alternatif" value="<?= set_value('kode_alternatif', kode_oto('kode_alternatif', 'tb_alternatif', 'A', 2)) ?>" />
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?= set_value('nama_alternatif') ?>" />
            </div>
            <?php foreach ($KRITERIA as $key => $val) : ?>
            <div class="form-group <?= $key == $TARGET ? 'hidden' : '' ?>">
                <label><?= $val->nama_kriteria ?> <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nilai[<?= $key ?>]" value="<?= isset($_POST['nilai'][$key]) ? $_POST['nilai'][$key] : '' ?>" />
            </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['tambah'])) {
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


        redirect_js("admin.php?m=klasifikasi");
    }
}

if (isset($_GET['act']) && $_GET['act'] == 'hapus') {

    if ($koneksi) {
        $jenis = $koneksi->query("SELECT * FROM tb_jenis");
        while ($raw = $jenis->fetch_assoc()) {
            $dbs = mysqli_connect('localhost', 'root', '', $raw['database']);
            $dbs->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
            $dbs->query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif='$_GET[ID]'");
        }
    } else {
        echo "!oke";
    }

    redirect_js("admin.php?m=klasifikasi");
}
?>