<?php
class ExerciseString
{
    public $check1;
    public $check2;
    public function readFile($file)
    {
        if (file_exists($file)) {
            $file1 = fopen($file, "r");
            $content = fread($file1, filesize($file));
            fclose($file1);
            return $content;
        } else {
            echo 'file không tồn tại <br>';
        }
    }

    public function checkValidString($str)
    {
        $a = strpos($str, "book");
        $b = strpos($str, "restaurant");
        if (($a !== false && $b !== false) || ($a === false && $b === false)) {
            return false;
        }
        return true;
    }

    public function writeFile($check1, $check2, $n)
    {
        if (file_exists('file result_file.txt')) {
            $file2 = fopen('file result_file.txt', "w+");
            if ($check1 == true) {
                $text1 = "Check 1 là chuỗi hợp lệ.";
            } else $text1 = "Check 1 là chuỗi không hợp lệ";
            if ($check2 == true) {
                $text2 = "Check 2 là chuỗi hợp lệ và có " . $n . "câu";
            } else $text2 = "Check 2 là chuỗi không hợp lệ và có" . $n . "câu";
            $text = "$text1 \n $text2";
            fwrite($file2, $text);
            fclose($file2);
        } else {
            echo 'file không tồn tại';
        }
    }
}
$object1 = new ExerciseString;
$str1 = $object1->readFile("file1.txt");
$checkFile1 = $object1->check1 = $object1->checkValidString($str1);
$str2 = $object1->readFile("file2.txt");
$checkFile2 = $object1->check2 = $object1->checkValidString($str2);
$n = substr_count($str2, ".");
$object1->writeFile($checkFile1, $checkFile2, $n);
