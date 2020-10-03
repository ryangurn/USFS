<?php

# setup composer
include('simplehtmldom/simple_html_dom.php');

$file = file_get_contents('camping_location.csv');
$lines = explode("\n", $file);
$lineCount = count($lines);
foreach ($lines as $num => $line)
{
    $str = "";
    $items = str_getcsv($line);

    $str .= "|--- " .$items[0]. " - " . $items[1] . " - ". $items[3] ." ---|\n";
    $str .= "|--- " .$items[5]." ---|\n";

    $html = file_get_html($items[5]);

    foreach($html->find('div[class="box"]') as $key => $div)
    {
        if ($key == 2) {
            $lat = "N/A";
            $lon = "N/A";
            foreach ($div->find('div[class="right-box"]') as $k => $b)
            {
                if ($k == 1)
                {
                    $lat = trim(str_replace("&nbsp;", "", $b->plaintext));
                }
                elseif ($k == 3)
                {
                    $lon = trim(str_replace("&nbsp;", "", $b->plaintext));
                }
            }
            $str .= $items[0]. "," . $items[1] . "," . $lat . "," . $lon . "\n";
        }
    }

    $str .= "\n\n";
    echo $items[4]." - ".$num."/".$lineCount."\t\t\r";
    file_put_contents('./3_camping_locations/'.$items[4].'.csv', $str, FILE_APPEND);
}
