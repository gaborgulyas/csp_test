<?php

error_reporting(E_ALL); ini_set('display_errors', 1);
date_default_timezone_set('Europe/Paris');

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec)*1000000;
}

$func = 'none';
if(isset($_GET['func']))
    $func = $_GET['func'];

if($func == '_onviolation')
{
    file_put_contents("csp.log", date("Y-m-d H:i:s").".".microtime_float().", violation\n", FILE_APPEND);
}
else if($func == '_onerror')
{
    file_put_contents("csp.log", date("Y-m-d H:i:s").".".microtime_float().", error\n", FILE_APPEND);
}
else if($func == '_onload')
{
    file_put_contents("csp.log", date("Y-m-d H:i:s").".".microtime_float().", load\n", FILE_APPEND);
}
else if($func == '_ontimeout')
{
    file_put_contents("csp.log", date("Y-m-d H:i:s").".".microtime_float().", timeout\n", FILE_APPEND);
}
// Set up the CSP violation test
else
{
    header("Content-Security-Policy: script-src 'self'; img-src 'self'; report-uri ./demo.php?func=_onviolation");

    file_put_contents("csp.log", date("Y-m-d H:i:s").".".microtime_float().", start\n");

?>
<html>
    <body>
        <img id='detector' data='https://gulyas.info/files/projects/snda_1.png'>
        <script src='./demo.js'></script>
    </body>
</html>
<?php

}

?>
