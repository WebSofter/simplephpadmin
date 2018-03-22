<?php

if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = rand(100,999).'.'.$extension;

    $location = './uploads/'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);

    $data = ["fileName"=>$name];
    echo json_encode($data);
}
?>