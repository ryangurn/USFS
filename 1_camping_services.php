<?php

# setup composer
include('simplehtmldom/simple_html_dom.php');

$parks = ["alabama", "allegheny", "angeles", "apalachicola", "arp", "ashley", "asnf", "bdnf", "bighorn", "bitterroot", "blackhills", "boise", "btnf", "carson", "cherokee", "chippewa", "chugach", "cibola", "cleveland", "cnnf", "coconino", "colville", "conf", "coronado", "crgnsa", "ctnf", "custergallatin", "dbnf", "deschutes", "dixie", "dpg", "eldorado", "elyunque", "fishlake", "flathead", "fremont-winema", "giffordpinchot", "gila", "gmfl", "gmug", "gwj", "hiawatha", "hlcnf", "hmnf", "hoosier", "htnf", "inyo", "ipnf", "kaibab", "kisatchie", "klamath", "kootenai", "lassen", "lincoln", "lolo", "lpnf", "ltbmu", "malheur", "mantilasal", "mbr", "mbs", "mendocino", "midewin", "mississippi", "mnf", "modoc", "mthood", "mtnf", "nebraska", "nezperceclearwater", "nfsnc", "ocala", "ochoco", "okawen", "olympic", "osceola", "osfnf", "ottawa", "ouachita", "payette", "psicc", "plumas", "prescott", "riogrande", "rogue-siskiyou", "sanjuan", "santafe", "sawtooth", "sbnf", "scnf", "scnfs", "sequoia", "shawnee", "shoshone", "sierra", "srnf", "stanislaus", "stnf", "siuslaw", "superior", "tahoe", "texas", "tongass", "tonto", "umatilla", "umpqua", "uwcnf", "wallowa-whitman", "wayne", "whitemountain", "whiteriver", "willamette"];

# bdnf(6), coconino(6), prescott(6), santafe(6)

foreach($parks as $park)
{
	# get html contents
	$url = "https://www.fs.usda.gov/activity/".$park."/recreation/camping-cabins";

	$html = file_get_html($url);

	echo "|--- " . $park . " ---|\n";

	if ($park == "bdnf" || $park == "coconino" || $park == "prescott" || $park == "santafe")
    {
        $loop = $html->find('ul', 6)->find('li');
    }
	else
    {
        $loop = $html->find('ul', 5)->find('li');
    }

	foreach($loop as $key => $ul)
	{
        echo $ul . "\n";
	}

//    foreach($html->find('ul') as $key => $ul)
//    {
//        foreach($html->find('li') as $li)
//        {
//            echo $key . ":". $li . "\n";
//        }
//    }

}