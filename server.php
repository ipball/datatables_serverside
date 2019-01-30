<?php
$files = file_get_contents('data.json');
$file_arrays = json_decode($files, true);
$datas = array();

$key = $_GET['start'];
for($i=0; $i<$_GET['length']; $i++){
    $datas[] = array(
        $file_arrays[$key]['id'],
        $file_arrays[$key]['first_name'],
        $file_arrays[$key]['last_name'],
        $file_arrays[$key]['email'],
        $file_arrays[$key]['gender']
    );
    $key++;
}

$json = array(
    'draw' => $_GET['draw'],
    'data' => $datas,
    'recordsTotal' => count($file_arrays),
    'recordsFiltered' => count($file_arrays)
);
exit(json_encode($json));
