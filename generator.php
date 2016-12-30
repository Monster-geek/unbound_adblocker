<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/10/16
 * Time: 7:25 PM
 */
/*
 *  Struc. of the .txt file should look like this :
 *
 *          domain-name1.com\n
 *          domain-name2.com\n
 *          domain-name3.com\n
 *          etc....
 */
$handle = @fopen("source.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $data .= $buffer;
    }
    if (!feof($handle)) {
        echo "Error: fgets() failed :/ \n";
    }
    fclose($handle);

    // "\n" is the delimiter
    $url = explode("\n", $data); // if fopen() fail this will cause an error but eh this is not for prod :)
    foreach ($url as $domaine)
    {
        echo "local-zone: \"$domaine\" redirect <br /> local-data: \"$domaine A 127.0.0.1\"<br />";
    }
}
