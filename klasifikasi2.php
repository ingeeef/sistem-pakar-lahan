<div class="page-header">
    <h1>Kesesuaian Lahan</h1>
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
                <th>Nama Lahan</th>
                <th>Data Lahan</th>
                <th>Kelas Kesesuaian</th>
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
                <table class="table table-bordered table-hover table-stripped">
                    <tr>
                        <th>Sangat Sesuai (S1)</th>
                        <th>Sesuai (S2)</th>
                        <th>Sesuai Marginal (S3)</th>
                        <th>Tidak Sesuai(N)</th>
                    </tr>
                    <?php
                        if ($koneksi) {
                            $jenis = $koneksi->query("SELECT * FROM tb_jenis");
                            while ($raw = $jenis->fetch_assoc()) {
                                $fuzzy = new Fuzzy();
                                $fuzzy->set_data(get_relasi_multi($raw['database'], $row->kode_alternatif));
                                $himpunan = get_himpunan_multi($raw['database']);
                                // $himpunan_ = get_himp();
                                // var_dump($himpunan_);
                                // var_dump($himpunan['kriteria']);
                                $fuzzy->hitung_nilai_multi($himpunan['kriteria_himpunan'], $himpunan['kriteria']);
                                $aturan = get_aturan_multi($raw['database']);
                                $fuzzy->set_rules($aturan);
                                $fuzzy->hitung_miu();
                                $fuzzy->hitung_z();
                                $fuzzy->hitung_total();
                                $fuzzy->hitung_rank();

                                $total = $fuzzy->get_total();
                                $rank = $fuzzy->get_rank();
                                // var_dump($total);
                                // echo "<br>";
                                // var_dump($rank);
                                $no = 1;

                                foreach ($rank as $key => $val) {
                                    $result = $fuzzy->get_klasifikasi($total[$key]);
                                    echo "<tr>";
                                    // echo "<td>" . $result . "</td>";
                                    if ($result == 'Sangat Sesuai (S1)') {
                                        echo "<td>" . $raw['jenis'] . "</td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                    if ($result == 'Sesuai (S2)') {
                                        echo "<td>" . $raw['jenis'] . "</td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                    if ($result == 'Sesuai Marginal (S3)') {
                                        echo "<td>" . $raw['jenis'] . "</td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                    if ($result == 'Tidak Sesuai (N)') {
                                        echo "<td>" . $raw['jenis'] . "</td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        } ?>
                </table>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>