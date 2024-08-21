<?php
$elements = $_POST;
$updatedSkills = [];

for ($split = 0; $split < count($elements); $split += 4)
{
    $newElements = array_slice($elements, $split, 4);
    array_push($updatedSkills, $newElements);
}

$file = 'skills.csv';
$stream = fopen($file, 'w');

foreach ($updatedSkills as $updateSkill)
{
    fputcsv($stream, $updateSkill, ';');
}

fclose($stream);

header('Location: /');