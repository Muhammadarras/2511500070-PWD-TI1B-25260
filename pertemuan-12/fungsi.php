<?php
function redirect_ke($url) {
    header("Location: " . $url);
    exit();
}

function bersihkan($str) {
    return htmlspecialchars(trim($str ?? ''));
}

function tidakKosong($str) {
    return strlen(trim($str)) > 0;
}

function formatTanggal($date) {
    // Jika tanggal kosong atau tidak valid, jangan tampilkan 1970
    if (!$date || $date == '0000-00-00 00:00:00') {
        return "-";
    }
    return date('d-m-Y H:i', strtotime($date));
}

function tampilkanBiodata($conf, $arr) {
    $html = "";
    foreach ($conf as $k => $v) {
        $label = $v["label"];
        $nilai = bersihkan($arr[$k] ?? '');
        $suffix = $v["suffix"];
        $html .= "<p><strong>{$label}</strong> {$nilai}{$suffix}</p>";
    }
    return $html;
}
?>