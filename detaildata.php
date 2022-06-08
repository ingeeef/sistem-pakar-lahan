<div class="page-header">
    <h1>Data Aturan</h1>
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
    <div class="panel-heading">Aturan</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Aturan</th>
                <?php foreach ($ALTERNATIF as $key => $val) : ?>
                    <th>miu[<?= $key ?>]</th>
                    <th>z[<?= $key ?>]</th>
                <?php endforeach ?>
            </tr>
        </thead>
        <?php
        $miu = $fuzzy->get_miu();
        $z = $fuzzy->get_z();
        foreach ($fuzzy->get_rules() as $key => $val) : ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $val->to_string() ?></td>
                <?php foreach ($ALTERNATIF as $k => $v) : ?>
                    <td><?= round($miu[$key][$k], 3) ?></td>
                    <td>[<?= round($z[$key][$k][0], 3) ?>, <?= round($z[$key][$k][1], 3) ?>]</td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>