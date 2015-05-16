<?php
$test1='2010-04-19 18:31:27';
echo date('d/m/Y',strtotime($test1)).'<br>';
echo date('Y-m-d',strtotime(date('d/m/Y',strtotime($test1))));
?>