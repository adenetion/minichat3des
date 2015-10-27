<?php
require 'vendor/autoload.php';
require_once __DIR__ . '/src/Library/cypher3des.php';

use Library\Container;

$jsrc = Container::getCrytoParams();
extract($jsrc);

echo safeHexToString($k);