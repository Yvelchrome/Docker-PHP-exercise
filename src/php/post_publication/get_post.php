<?php
require_once '../php/pdo.php';

$publications = $pdo->query("SELECT * FROM publication ORDER BY creation_date DESC");
