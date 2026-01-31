<?php


function redirect_ke($url) {
    header("Location: " . $url);
    exit();
}

function bersihkan($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

function tidakKosong($str) {
    return strlen(trim($str)) > 0;
}


function formatTanggal($tgl) {
    if (!$tgl || $tgl == '0000-00-00 00:00:00') return "-";
    return date("d M Y H:i", strtotime($tgl));
}

function tampilkanData($conf, $arr) {
    if (empty($arr)) {
        return "<p><em>Belum ada data anggota.</em></p>";
    }

    $html = "<div class='biodata-container'>";
    foreach ($conf as $k => $v) {
        $label = $v["label"];
        $nilai = isset($arr[$k]) ? bersihkan($arr[$k]) : '-';
        $suffix = $v["suffix"] ?? '';
        $html .= "<p><strong>{$label}</strong> {$nilai}{$suffix}</p>";
    }
    $html .= "</div>";
    return $html;
}
?>