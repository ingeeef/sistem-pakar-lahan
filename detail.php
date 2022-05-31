<div class="page-header">
    <h1>Detail</h1>
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
    <div class="panel-heading">Hasil Defuzifikasi</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Total</th>
                <th><?= $KRITERIA[$TARGET]->nama_kriteria ?></th>
            </tr>
        </thead>
        <?php
        $total = $fuzzy->get_total();
        $rank = $fuzzy->get_rank();
        $no = 1;
        foreach ($rank as $key => $val) : ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $ALTERNATIF[$key] ?></td>
                <td><?= round($total[$key], 3) ?></td>
                <td><?= $fuzzy->get_klasifikasi($total[$key]) ?></td></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>