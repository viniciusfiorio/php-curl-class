<?php
require '../src/Curl/Curl.php';

use \Curl\Curl;

$curl = new Curl();
$curl->progress(function ($client, $download_size, $downloaded, $upload_size, $uploaded){
    if ($download_size === 0) {
        return;
    }

    $progress = floor( $downloaded * 100 / $download_size );
    echo ' ' . $progress . '%' . "\r";
});
$curl->download('https://php.net/distributions/manual/php_manual_en.html.gz', '/tmp/php_manual_en.html.gz');
