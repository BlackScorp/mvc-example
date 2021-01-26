<?php
require_once  __DIR__.'/bootstrap.php';

$foo = new Controller_Index();
echo $foo->indexAction();