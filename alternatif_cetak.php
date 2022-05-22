<h1>Alternatif</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Alternatif</th>
            <?php foreach ($KRITERIA as $key => $val) : if ($key == $TARGET) continue ?>
                <th><?= $val->nama_kriteria ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY kode_alternatif");
    $data = get_relasi();
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->kode_alternatif ?></td>
            <td><?= $row->nama_alternatif ?></td>
            <?php foreach ($data[$row->kode_alternatif] as $k => $v) : ?>
                <td><?= $v ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>