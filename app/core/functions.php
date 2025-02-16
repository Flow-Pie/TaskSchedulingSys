<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

//mute all malicious code
function sanitize($dirty_code)
{
    return htmlspecialchars($dirty_code);
}
