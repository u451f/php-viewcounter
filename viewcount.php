<?php
// this file is responsible for counting video views
// For each video, one file is written.
// There's only a total view count, not a count by month or year.

if(isset($_POST['filename'])) {
    $filename_values = array_values(explode("/", filter_var($_POST['filename'], FILTER_SANITIZE_STRING)));
    $filename = 'views_'.end($filename_values).'.txt';
    $file = $filename;

    $fp = fopen($file, 'c+');
    flock($fp, LOCK_EX);

    $count = (int)fread($fp, filesize($file));
    ftruncate($fp, 0);
    fseek($fp, 0);
    fwrite($fp, $count + 1);

    flock($fp, LOCK_UN);
    fclose($fp);
    return true;
}
?>
