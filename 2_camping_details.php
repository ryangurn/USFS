<?php

# setup composer
include('simplehtmldom/simple_html_dom.php');

$parks = file_get_contents('info.csv');
$parks = explode("\n", $parks);

# allegheny[6083][29/31]=11, allegheny[6083][33]=10, allegheny[6083][34]=14, allegheny[6083][101]=7
# bdnf(6), coconino(6), prescott(6), santafe(6)

foreach($parks as $park)
{
    $p = str_getcsv($park);

    $act = explode(",", str_replace("\"", "", $p[5]));
    foreach($act as $a)
    {
        # get html contents
        $url = "https://www.fs.usda.gov/activity/".$p[3]."/recreation/camping-cabins/?recid=".$p[1]."&actid=".$a;

        $html = file_get_html($url);

        echo "|--- " . $p[3] . " - ". $url ." ---|\n";
        file_put_contents('2_camping_details/'.$p[3].'.html', "\n|--- " . $p[3] . " - ". $url ." ---|\n", FILE_APPEND);

//        foreach($html->find('ul') as $key => $ul)
//        {
//            echo $key . ':' . $ul . "\n";
////            foreach($html->find('li') as $li)
////            {
////                echo $key . ":". $li . "\n";
////            }
//        }

        // query modification
        if($p[1] == 6083)
        {
            if ($a == 29 || $a == 31)
            {
                $query = $html->find('ul', 11)->find('li');
            }
            elseif($a == 33)
            {
                $query = $html->find('ul', 10)->find('li');
            }
            elseif($a == 34)
            {
                $query = $html->find('ul', 14)->find('li');
            }
            elseif($a == 101)
            {
                $query = $html->find('ul', 7)->find('li');
            }
        }
        elseif($p[1] == 41619)
        {
            if ($a == 34)
            {
                // TODO: Test this...
                $query = $html->find('ul', 6)->find('li');
            }
        }
        else
        {
            $query = $html->find('ul', 5)->find('li');
        }

        foreach($query as $key => $li)
        {
            file_put_contents('2_camping_details/'.$p[3].'.html', $key.":".$li ."\n", FILE_APPEND);
        }

    }
}