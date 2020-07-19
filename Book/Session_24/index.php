<?php
include 'empdetail.inc';

$empdetail = new empdetail();
$empdetail->enteremp(1, "Hieu", "HaNoi");

echo $empdetail->empname; echo '<br>';

include 'net_salary.inc';
$sal = new net_salary();
echo $sal->net(372500);

?>