<?php
$file1 = fopen("file1.txt", "r");
$file2 = fopen("file2.txt", "r");

function checkString($str)
{
    $a = strpos($str, "book");
    $b = strpos($str, "restaurant");
    if (($a !== false && $b !== false) || ($a === false && $b === false)) {
        return false;
    }
    return true;
}

$str1 = fread($file1, filesize("file1.txt"));
$str2 = fread($file2, filesize("file2.txt"));

if (checkString($str1)) {
    $n = substr_count($str1, ".");
    //substr_count() kiểm tra số lượng câu trong chuỗi
    echo "Chuỗi 1 hợp lệ. Chuỗi bao gồm " . $n . " câu.";
} else {
    echo  "Chuỗi 1 không hợp lệ.";
}

if (checkString($str2)) {
    $n = substr_count($str2, ".");
    echo "<br>Chuỗi 2 hợp lệ. Chuỗi bao gồm " . $n . "câu.";
} else {
    echo  "<br>Chuỗi 2 không hợp lệ.";
}
