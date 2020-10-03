<?php

# setup composer
include('simplehtmldom/simple_html_dom.php');

define('FOLDER_NAME', '2_camping_details_testing');

$parks = file_get_contents('camping_details_info.csv');
$parks = explode("\n", $parks);

foreach($parks as $park)
{
    $p = str_getcsv($park);

    if($p != null) {
        $act = explode(",", str_replace("\"", "", $p[5]));
        foreach($act as $a)
        {
            # get html contents
            $url = "https://www.fs.usda.gov/activity/".$p[3]."/recreation/camping-cabins/?recid=".$p[1]."&actid=".$a;

            $html = file_get_html($url);

            echo "|--- " . $p[3] . " - ". $url ." ---|\n";
            file_put_contents(FOLDER_NAME . '/' .$p[3].'.html', "\n|--- " . $p[3] . " - ". $url ." ---|\n", FILE_APPEND);


            // default query
            $query = $html->find('ul', 5)->find('li');
            // query modification
            if($p[1] == 4832)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 5566)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 5659)
            {
                $query = $html->find('ul', 6)->find('li');
            }
            elseif($p[1] == 6083)
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
            elseif($p[1] == 6418)
            {
                if ($a == 101)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
                elseif($a == 29 || $a == 34 || $a == 33)
                {
                    $query = $html->find('ul', 6)->find('li');
                }

            }
            elseif($p[1] == 10454)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 10902)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 12403)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 13053)
            {
                if ($a == 31 || $a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
                elseif ($a == 33)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 13267)
            {
                if ($a == 101)
                {
                    $query = $html->find('ul',9)->find('li');
                }
                elseif ($a == 29)
                {
                    $query = $html->find('ul', 10)->find('li');
                }
                elseif ($a == 34)
                {
                    $query = $html->find('ul',7)->find('li');
                }
                elseif ($a == 33)
                {
                    $query = $html->find('ul',8)->find('li');
                }
            }
            elseif($p[1] == 14833)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 17520)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 18536)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 24)->find('li');
                }
                elseif ($a == 31)
                {
                    $query = $html->find('ul', 23)->find('li');
                }
                elseif ($a == 33)
                {
                    $query = $html->find('ul', 18)->find('li');
                }
                elseif ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 25120)
            {
                if ($a == 29 || $a == 33)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
                elseif ($a == 34)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 25823)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 26225)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 9)->find('li');
                }
            }
            elseif($p[1] == 26620)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 27717)
            {
                if ($a == 29 || $a == 31)
                {
                      $query = $html->find('ul', 11)->find('li');
                }
                elseif ($a == 34)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 28024)
            {
                if ($a == 31)
                {
                    $query = $html->find('ul', 4)->find('li');
                }
                elseif ($a == 34)
                {
                    $query = $html->find('ul', 8)->find('li');
                }
            }
            elseif($p[1] == 29872)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 31178)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 35807)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 36905)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 39314)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
                elseif ($a == 34)
                {
                    $query = $html->find('ul');
                }
            }
            elseif($p[1] == 39892)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 40405)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 41466)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 9)->find('li');
                }
            }
            elseif($p[1] == 41619)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 17)->find('li');
                }
            }
            elseif($p[1] == 42728)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 47687)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 12)->find('li');
                }
            }
            elseif($p[1] == 54884)
            {
                $query = $html->find('ul');
                if ($a == 34)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
                else
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 56399)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 67155)
            {
                if ($a == 33 | $a == 31 | $a == 101)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
                elseif($a == 34)
                {
                    $query = $html->find('ul', 8)->find('li');
                }
                elseif($a == 29)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
            }
            elseif($p[1] == 69400)
            {
                $query = $html->find('ul', 6)->find('li');
            }
            elseif($p[1] == 71389)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 16)->find('li');
                }
            }
            elseif($p[1] == 72816)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 73539)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 6)->find('li');
                }
            }
            elseif($p[1] == 74405)
            {
                if ($a == 29)
                {
                    $query = $html->find('ul', 7)->find('li');
                }
                elseif ($a == 34)
                {
                    $query = $html->find('ul', 8)->find('li');
                }
            }
            elseif($p[1] == 75436)
            {
                $query = $html->find('ul', 6)->find('li');
            }
            elseif($p[1] == 79451)
            {
                if ($a == 34)
                {
                    $query = $html->find('ul', 8)->find('li');
                }
            }

            foreach($query as $key => $li)
            {
                file_put_contents(FOLDER_NAME . '/'.$p[3].'.html',   $li ."\n", FILE_APPEND);
            }

        }
    }
}