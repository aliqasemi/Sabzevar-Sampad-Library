<?php

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;

$before_date = Carbon::now()->subDays(0)->toDateString();
$after_date = Carbon::now()->addDays(15)->toDateString();

$before_date = new Verta($before_date);
$before_date = $before_date->format('Y-n-j   ');

$after_date = new Verta($after_date);
$after_date = $after_date->format('Y-n-j');

echo $before_date.'    ' ;
echo $after_date.'      ' ;

$today = verta();

$return_date = Verta::createFromFormat("1396-03-31");
echo $return_date ;
/*$return_date = $return_date->format('Y-n-j');
echo $return_date.'        ' ;
$different_days = $return_date->diffDays($today);*/

//echo $different_days ;
