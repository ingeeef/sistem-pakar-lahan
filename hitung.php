<div class="page-header">
    <h1>Perhitungan</h1>
</div>
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
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Nama Lahan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <?php foreach ($KRITERIA as $key => $val) : if ($key == $TARGET) continue ?>
                    <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($fuzzy->get_data() as $key => $val) : ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $ALTERNATIF[$key] ?></td>
                <?php foreach ($val as $k => $v) : ?>
                <td><?= $v ?></td>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Nilai Fuzzy</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover small">
            <thead>
                <tr>
                    <th rowspan="3"></th>
                    <?php foreach ($KRITERIA as $key => $val) : if ($key == $TARGET) continue ?>
                    <th colspan="<?= count($KRITERIA_HIMPUNAN[$key]) ?>" class="text-center"><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
                <tr>
                    <?php foreach ($KRITERIA as $key => $val) : if ($key == $TARGET) continue ?>
                    <?php foreach ($KRITERIA_HIMPUNAN[$key] as $k => $v) : ?>
                    <td><?= $HIMPUNAN[$k]->nama_himpunan ?><br />[<?= $HIMPUNAN[$k]->n1 ?> <?= $HIMPUNAN[$k]->n2 ?> <?= $HIMPUNAN[$k]->n3 ?> <?= $HIMPUNAN[$k]->n4 ?>]</td>
                    <?php endforeach ?>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($fuzzy->get_nilai() as $key => $val) : ?>
            <tr>
                <th><?= $key ?></th>
                <?php foreach ($val as $k => $v) : ?>
                <?php foreach ($v as $a => $b) : ?>
                <td><?= round($b, 3) ?></td>
                <?php endforeach ?>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">Hasil Defuzifikasi</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Total Nilai</th>
                <th><?= $KRITERIA[$TARGET]->nama_kriteria ?></th>
            </tr>
        </thead>
        <?php
        $total = $fuzzy->get_total();
        $rank = $fuzzy->get_rank();
        $no = 1;
        foreach ($rank as $key => $val) : ?>
        <tr>
            <td><?= $val ?></td>
            <td><?= $key ?></td>
            <td><?= $ALTERNATIF[$key] ?></td>
            <td><?= round($total[$key], 3) ?></td>
            <td><?= $fuzzy->get_klasifikasi($total[$key]) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>