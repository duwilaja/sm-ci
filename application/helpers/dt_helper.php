<?php

function kontruksi($xx='')
{
    $x = '';
    foreach (KONTRUKSI as $k => $v) {
        if($v['nilai'] == $xx) return $v['nama'];
    }
}

function select_dt($t='',$field,$dt=''){
    $field[0] = '<a href="#" data-toggle="modal" data-target="#myModal2" onclick="get_data_id('.$dt->rowid.')">'.$field[0].'</a>';
    // atur If disini bos
    if ($t == 'kondisi_jalan') {
        $field[4] = kontruksi($field[4]);
    }

    return $field;

}