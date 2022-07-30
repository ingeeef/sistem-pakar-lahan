<?php
$fuzzy = new Fuzzy();
$fuzzy->set_data(get_relasi());
$fuzzy->hitung_nilai();
$aturan = get_aturan();
$fuzzy->set_rules($aturan);
$fuzzy->hitung_miu();
$fuzzy->hitung_z();
$fuzzy->hitung_total();
$fuzzy->hitung_rank();
?>

<div class="page-header">
    <h1>Klasifikasi Kesesuaian Lahan</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=klasifikasi_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=alternatif&q=<?= _get('q') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kriteria</th>
                <th>Hasil</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field(_get('q'));
        $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif LIKE '%$q%' OR nama_alternatif LIKE '%$q%' ORDER BY kode_alternatif");
        $data = get_relasi();
        $no = 0;
        foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->kode_alternatif ?></td>
            <td>

                <?= $row->nama_alternatif ?>
            </td>
            <td>
                Defuzifikasi
            </td>
            <td>
                <table class="table table-bordered table-hover table-stripped">
                    <tr>
                        <?php foreach ($KRITERIA as $key => $val) : if ($key == $TARGET) continue ?>
                        <th><?= $val->nama_kriteria ?></th>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                        <?php foreach ($data[$row->kode_alternatif] as $k => $v) : ?>
                        <td><?= $v ?></td>
                        <?php endforeach ?>
                    </tr>
                </table>
            </td>
            <td>

                <?php
                    if ($koneksi) {
                        $jenis = $koneksi->query("SELECT * FROM tb_jenis");
                        while ($raw = $jenis->fetch_assoc()) {

                            $total = $fuzzy->get_total();
                            $rank = $fuzzy->get_rank();
                        }
                    } ?>
                <?php foreach ($rank as $key => $val) : ?>
            <td><?= $fuzzy->get_klasifikasi($total[$key]) ?></td>
            </td>
            <?php endforeach ?>
            </td>
            <td>
                <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=<?= $row->kode_alternatif ?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="?m=klasifikasi_tambah&act=hapus&ID=<?= $row->kode_alternatif ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>