<style>
    .info-card {
        border: 1px solid black;
        /* padding: 10px 10px 10px 10px; */
        /* max-width: 50%; */
        width: 100%;
    }

    .avatar {
        width: 60px;
        height: 60px;
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 0 0;
    }

    .block {
        white-space: nowrap
    }

    .block div {
        display: inline-block;
    }
</style>

<?php

error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

session_start();

include("db.php");

$id = $_GET["id"];

$result = mysqli_query($mysqli, "SELECT * FROM questionnaires WHERE id='$id' ");
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($mysqli, "SELECT * FROM photos WHERE id_quest='$id' ");
$row2 = mysqli_fetch_array($result2);

if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
?>

    <?php include("prof.php"); ?>

    <?php do { ?>


        <div class="block">
            <div class="info-card">
                <p>Имя: <?php echo $row["fname"]; ?></p>
                <p>Фамилия: <?php echo $row["lname"]; ?></p>
                <p>Отчество: <?php echo $row["tname"]; ?></p>
                <p>Дата рождения: <?php echo $row["birthday"]; ?></p>
                <p>Пол: <?php echo $row["gender"]; ?></p>
                <p>Цвет: <?php echo $row["lovecolor"]; ?></p>
                <p>Навыки: <?php echo $row["options"]; ?></p>
                <p>Личные качества: <?php echo $row["merit"]; ?></p>
                <p>Аватарка: <img class="avatar" src="<?php echo $row["avatar"]; ?>"></img></p>


                <p>Фотографии:

                    <?php do { ?>
                        <img class="avatar" src="<?php echo $row2["path"]; ?>"></img>
                    <?php } while ($row2 = mysqli_fetch_array($result2)); {
                    } ?>
                </p>

            </div>
        </div>





    <?php } while ($row = mysqli_fetch_array($result)); {
    } ?>

<?php } else {
    echo '<a href="/login.php"> Авторизуйтесь </a>';
} ?>