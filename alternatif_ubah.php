<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Alternatif</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_alternatif" readonly="readonly" value="<?= $row->kode_alternatif ?>" />
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?= set_value('nama_alternatif', $row->nama_alternatif) ?>" />
            </div>
            <?php
            $rows = $db->get_results("SELECT ra.ID, k.*, ra.nilai 
            FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  
            WHERE kode_alternatif='$_GET[ID]'
            ORDER BY kode_kriteria");
            foreach ($rows as $row) : ?>
                <div class="form-group <?= $row->kode_kriteria == $TARGET ? 'hidden' : '' ?>">
                    <label><?= $row->nama_kriteria ?> (<?= $row->batas_bawah ?> - <?= $row->batas_atas ?>)</label>
                    <input class="form-control" type="text" name="nilai[<?= $row->ID ?>]" value="<?= $row->nilai ?>" />
                </div>
            <?php endforeach ?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>