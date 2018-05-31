<?php


$query = require 'core/bootstrap.php';


$clientsdata = $query->selectAll('clients');


require_once 'views/index.view.php';