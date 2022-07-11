<div class="page-header">
    <h1>Tambah Jenis</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <form method="post">
            <div class="form-group">
                <label>Jenis <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="jenis" value="" onkeyup="getJenis(this)" required />
            </div>
            <div class="form-group">

                <label>Database<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="database" value="" readonly />
                <code>Ketika anda menambah jenis, maka database baru akan dibuat.</code>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="create_jenis"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=jenis"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>


<script>
    let getJenis = (e) => {
        $(e).val($(e).val().replace(/[^a-z0-9]/gi, ''))
        $('input[name=database]').val('mamdani_mom_' + $(e).val())
    }
</script>

<?php
session_start();

if (isset($_POST['create_jenis'])) {
    $jenis = $_POST['jenis'];
    $database = $_POST['database'];
    $root = mysqli_connect('localhost', 'root', '');
    if (!$root) {
        echo "tidak terhubung ke database";
        die;
    }
    $sql = "CREATE DATABASE $database";
    if (!mysqli_query($root, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($root);
        die;
    }
    $sql = "INSERT INTO tb_jenis values (NULL,'$jenis','$database',0)";
    if ($koneksi->query($sql)) {
        $link = mysqli_connect("localhost", "root", "", $database);
        $link->multi_query(file_get_contents('database/base.sql'));
        header('location:admin.php?m=jenis');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

if (isset($_GET['delete'])) {
    if ($_GET['status'] == 1) {
        header('location:admin.php?m=jenis');
        die;
    }
    $id = $_GET['delete'];
    $database = $_GET['database'];
    $sql = "DELETE FROM tb_jenis WHERE id = $id";
    if ($koneksi->query($sql)) {
        $root = mysqli_connect('localhost', 'root', '');
        if (!$root) {
            echo "tidak terhubung ke database";
            die;
        }
        $sql = "DROP DATABASE $database";
        if (!mysqli_query($root, $sql)) {
            if (!mysqli_error($root) == "Can't drop database '$database'; database doesn't exist") {
                echo "Error: " . $sql . "<br>" . mysqli_error($root);
                die;
            }
        }

        header('location:admin.php?m=jenis');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

if (isset($_GET['aktif'])) {
    $id = $_GET['aktif'];
    $sql = "UPDATE tb_jenis SET status = 0 WHERE status = 1";
    $koneksi->query($sql);
    $sql = "UPDATE tb_jenis SET status = 1 WHERE id = $id";
    $koneksi->query($sql);

    $_SESSION['jenis'] = $_GET['database'];
    // var_dump($_SESSION['jenis']);
    // die;
    // if (isset($db)) {
    //     $db->refresh('MYSQLI_REFRESH_TABLES');
    //     $db->refresh('MYSQLI_REFRESH_GRANT');
    // }
    header('location:admin.php?m=jenis');
}
?>