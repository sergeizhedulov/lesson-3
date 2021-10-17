function delBackspace ($str) {
    $text = array (
    " " => "_",
    "!" => "",
    "?" => "",
    "%" => ""
        );
    return strtr($str, $text);
}
echo delBackspace("ПРОБЕЛ ПРОБЕЛ ПРОБЕЛ");