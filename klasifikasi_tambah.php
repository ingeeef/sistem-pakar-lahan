<div class="page-header">
    <h1>Masukan Data Lahan</h1>
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
                    <input class="form-control input_<?= $key ?>" type="text" name="nilai[<?= $key ?>]" value="<?= isset($_POST['nilai'][$key]) ? $_POST['nilai'][$key] : '' ?>" />
                </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.input_C01, .input_C03').on("keypress keyup", function() {
            this.value = this.value.replace(/[^0-9]/g, '');

            $('.alert1').remove()

            if ($(this).val() > 5000 && $(this).hasClass('input_C01')) {
                $(this).before(`
                    <code class="alert1">Curah Hujan Tidak Boleh Lebih Dari 5000 mm/tahun</code> 
                `)
            }

            if ($(this).val() > 200 && $(this).hasClass('input_C03')) {
                $(this).before(`
                    <code class="alert1">Kedalaman Tanah Tidak Boleh Lebih Dari 200m</code> 
                `)
            }
        });

        $('.input_C02').on("keypress keyup", function(event) {
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }

            num = $(this).val()

            $('.alert2').remove()

            if (num > 14) {
                $(this).before(`
                    <code class="alert2">pH Tanah Tidak Boleh Lebih Dari 14</code> 
                `)
            }
        });
    });
</script>

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
        // if ($koneksi) {
        //     $jenis = $koneksi->query("SELECT * FROM tb_jenis");
        //     while ($raw = $jenis->fetch_assoc()) {
        //         $dbs = mysqli_connect('localhost', 'root', '', $raw['database']);
        //         $dbs->query("INSERT INTO tb_alternatif(kode_alternatif, nama_alternatif) VALUES ('$kode_alternatif', '$nama_alternatif')");
        //         foreach ($nilai as $key => $val) {
        //             $val *= 1;
        //             $dbs->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, nilai) VALUES ('$kode_alternatif', '$key', $val)");
        //         }
        //     }
        // } else {
        //     echo "!oke";
        // }
        if ($koneksi) {
            $jenis = $koneksi->query("SELECT * FROM tb_jenis");
            while ($raw = $jenis->fetch_assoc()) {
                $dbs = mysqli_connect('localhost', 'root', '', $raw['database']);
                $dbs->query("INSERT INTO tb_alternatif(kode_alternatif, nama_alternatif) VALUES ('$kode_alternatif', '$nama_alternatif')");
                foreach ($nilai as $key => $val) {
                    $val = (float) $val;  // Convert $val to a float to ensure it's numeric
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