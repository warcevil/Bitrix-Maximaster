<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/local/classes/maximaster/FileManager.php');

CAgent::AddAgent(
    "Maximaster\Helpers\FileManager::CreateFile();",
    "",
    "N",
    5,
    "",
    "Y",
    "",
    30);