<?php

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;

$before_date = Carbon::now()->subDays(0)->toDateString();
$after_date = Carbon::now()->addDays(15)->toDateString();

$before_date = new Verta($before_date);
$before_date = $before_date->format('Y-n-j   ');

$after_date = new Verta($after_date);
$after_date = $after_date->format('Y-n-j   ');

echo $before_date.'    ' ;
echo $after_date ;
