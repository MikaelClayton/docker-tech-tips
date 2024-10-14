<?php
$DateObj = new DateTime();
// this format Wednesday 21 Jun 2023 12:35:56
echo <<<STRING
 It is now {$DateObj->format('l, d M Y H:i:s')} (UTC) my dudes
STRING;
