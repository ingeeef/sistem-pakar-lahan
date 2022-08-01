<?php
include 'functions.php';


$list = array();
$kriteria = $db->get_results("SELECT * FROM tb_kriteria");
foreach ($kriteria as $key => $row) {
    if ($key < (count($kriteria) - 1)) {
        // echo "<br>" . $row->kode_kriteria;
        $himpunan = $db->get_results("SELECT * FROM tb_himpunan where kode_kriteria = '$row->kode_kriteria'");
        array_push($list, $himpunan);
        // if (array_key_exists($row->kode_kriteria, $list)) {
        //     $list = array_merge([$row->kode_kriteria => []]);
        // }
        // foreach ($himpunan as $hmp) {
        //     $list[$hmp->nama_himpunan][] = $hmp->nama_himpunan;
        // }
    }
}

// var_dump($list);

// foreach ($list as $l) {
// var_dump($l);
// foreach ($l as $k) {
//     echo "<br>" . $k;
// }
// }

$lb = $list[0];
$lb2 = $list[1];
$lb3 = $list[2];

$aturan = [
    'N' => 0,
    'S3' => 1,
    'S2' => 2,
    'S1' => 3
];

$num = 1;

// foreach ($lb as $key => $value) {
//     echo $value;
// }
$list_aturan = [];
for ($i = 0; $i < count($lb); $i++) {
    for ($j = 0; $j < count($lb2); $j++) {
        for ($k = 0; $k < count($lb3); $k++) {
            echo $num . ' ' . $lb[$i]->nama_himpunan . '_' . $lb2[$j]->nama_himpunan . '_' . $lb3[$k]->nama_himpunan . '<br>';
            $list_aturan = [$aturan[$lb[$i]->penanda], $aturan[$lb2[$j]->penanda], $aturan[$lb3[$k]->penanda]];
            echo min($list_aturan);
            $aturan[$lb[$i]->penanda];


            $kd_kriteria = $lb[$i]->kode_kriteria;
            $kd_himpunan = $lb[$i]->kode_himpunan;
            $db->query("INSERT INTO tb_aturan (no_aturan, operator, kode_kriteria, kode_himpunan)
                        VALUES ('$num', 'AND', '$kd_kriteria', '$kd_himpunan')");
            $kd_kriteria = $lb2[$j]->kode_kriteria;
            $kd_himpunan = $lb2[$j]->kode_himpunan;
            $db->query("INSERT INTO tb_aturan (no_aturan, operator, kode_kriteria, kode_himpunan)
                        VALUES ('$num', 'AND', '$kd_kriteria', '$kd_himpunan')");
            $kd_kriteria = $lb3[$k]->kode_kriteria;
            $kd_himpunan = $lb3[$k]->kode_himpunan;
            $db->query("INSERT INTO tb_aturan (no_aturan, operator, kode_kriteria, kode_himpunan)
                        VALUES ('$num', 'AND', '$kd_kriteria', '$kd_himpunan')");


            $kd_kriteria = 'C04';
            if ($aturan[$lb[$i]->penanda] == '0') {
                $db->query("INSERT INTO tb_aturan (no_aturan, operator, kode_kriteria, kode_himpunan)
            VALUES ('$num', 'AND', '$kd_kriteria', 'C04-01')");
            }
            if ($aturan[$lb[$i]->penanda] == '1') {

                $db->query("INSERT INTO tb_aturan (no_aturan, operator, kode_kriteria, kode_himpunan)
            VALUES ('$num', 'AND', '$kd_kriteria', 'C04-02')");
            }
            if ($aturan[$lb[$i]->penanda] == '2') {

                $db->query("INSERT INTO tb_aturan (no_aturan, operator, kode_kriteria, kode_himpunan)
            VALUES ('$num', 'AND', '$kd_kriteria', 'C04-03')");
            }
            if ($aturan[$lb[$i]->penanda] == '3') {

                $db->query("INSERT INTO tb_aturan (no_aturan, operator, kode_kriteria, kode_himpunan)
            VALUES ('$num', 'AND', '$kd_kriteria', 'C04-04')");
            }



            $num += 1;
        }
    }
}


// foreach (permutations($list) as $permutation) {
//     echo implode(',', $permutation) . PHP_EOL;
// }
