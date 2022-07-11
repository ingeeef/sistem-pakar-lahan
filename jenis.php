<div class="page-header">
    <h1>Jenis</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="jenis" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=jenis_aksi"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jenis</th>
                <th>Database</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $rows = $koneksi->get_results("SELECT * FROM tb_jenis WHERE jenis LIKE '%$q%' ORDER BY id");
        $no = 0;
        foreach ($rows as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row->jenis ?></td>
                <td><?= $row->database ?></td>
                <td>
                    <?= $row->status == 0 ? '<span class="badge" style="background-color: red;">tidak aktif</span>' : '<span class="badge" style="background-color: green;">aktif</span>' ?>
                </td>
                <td>
                    <?php if ($row->status == 1) { ?>
                        <a class="btn btn-xs btn-success" href="#" disabled readonly><span class="glyphicon glyphicon-check"></span>aktifkan</a>
                        <!-- <a class="btn btn-xs btn-warning" href="#" disabled readonly><span class="glyphicon glyphicon-edit"></span></a> -->
                        <a class="btn btn-xs btn-danger" href="#" disabled readonly><span class="glyphicon glyphicon-trash"></span></a>
                    <?php } else {  ?>
                        <a class="btn btn-xs btn-success" href="?m=jenis_aksi&aktif=<?= $row->id ?>&database=<?= $row->database ?>"><span class="glyphicon glyphicon-check"></span>aktifkan</a>
                        <!-- <a class="btn btn-xs btn-warning" href="?m=kriteria_ubah&ID=<?= $row->id ?>"><span class="glyphicon glyphicon-edit"></span></a> -->
                        <a class="btn btn-xs btn-danger" href="?m=jenis_aksi&delete=<?= $row->id ?>&database=<?= $row->database ?>&status=<?= $row->status ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    <?php
                    } ?>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>