<?php
if($_SERVER["REQUEST_URI"] == "/style.css") {
    header("Content-Type: text/css");
    echo file_get_contents('style.css');
} 
elseif($_SERVER["REQUEST_URI"] == '/reset.css') {
    header("Content-Type: text/css");
    echo file_get_contents('reset.css');
}
elseif($_SERVER["REQUEST_URI"] == '/post') {
      $file = fopen("db.csv", 'a');
      if ($file === false) throw new Exception("Failed to open file: db.csv");
      fwrite($file, $_POST['text'] . ';');
      fclose($file);
      header('Location: /');
}
elseif($_SERVER["REQUEST_URI"] == '/get') {
    header('Content-Type: text/csv');
    // header('Content-Disposition: attachment; filename="db.csv"');
    readfile("db.csv");
    exit;
    // header('Location: /');
}
else {
    $layout = file_get_contents('layout.html');
    echo $layout;
}