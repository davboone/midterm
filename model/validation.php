<?php
function validName($name)
{
    return !empty($name);
}

function validOptions($option)
{
    $validOptions = getOptions();
    foreach ($option as $userChoice) {
        if(!in_array($userChoice, $validOptions)) {
            return false;
        }
    }

    //All choices are valid
    return true;
}