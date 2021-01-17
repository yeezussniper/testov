<?php
session_start();

$mysqli = new Mysqli('localhost', 'root', 'root', 'test_db');


$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$tname = trim($_POST['tname']);

$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$lovecolor = $_POST['lovecolor'];
$merit = $_POST['merit'];
$options = $_POST['options'];
$optionsUser = implode(",", $options);



$query = $mysqli->query("INSERT INTO questionnaires (`fname`, `lname`, `tname`, `birthday`, `gender`, `lovecolor`, `merit`, `options`) 
VALUES ('$fname', '$lname', '$tname', '$birthday', '$gender', '$lovecolor', '$merit', '$optionsUser') ");

$lastid = mysqli_insert_id($mysqli);

$file = "avatars/" . $_FILES['path']['name'];
move_uploaded_file($_FILES['path']['tmp_name'], $file);

if (isset($_FILES['path']['name'])) {
    
    $query = $mysqli->query("UPDATE questionnaires SET avatar='$file' WHERE id='$lastid' ");
}

if (isset($_FILES['path2']['name'])) {

    $target_dir = 'photos/';

    $total_files = count($_FILES['path2']['name']);

    for ($key = 0; $key < $total_files; $key++) {

        // Check if file is selected
        if (
            isset($_FILES['path2']['name'][$key])
            && $_FILES['path2']['size'][$key] > 0
        ) {

            $original_filename = $_FILES['path2']['name'][$key];
            $target = $target_dir . basename($original_filename);
            $tmp  = $_FILES['path2']['tmp_name'][$key];
            move_uploaded_file($tmp, $target);

            $query = $mysqli->query("INSERT INTO photos (id_quest, path) VALUES ('$lastid', '$target') ");

        }
    }
}

echo header("Refresh:0; url=quest.php");
