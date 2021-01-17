<style>
    * {
        box-sizing: border-box;
    }

    .flat-table {
        display: block;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 115%;
        overflow: auto;
        width: auto;
        margin: 100px auto;
    }

    th {
        background-color: rgb(112, 196, 105);
        color: white;
        font-weight: normal;
        padding: 20px 30px;
        text-align: center;
    }

    td {
        background-color: rgb(238, 238, 238);
        color: rgb(111, 111, 111);
        padding: 20px 30px;
    }
</style>

<?php

error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

session_start();

include("db.php");

$result = mysqli_query($mysqli, "SELECT * FROM questionnaires ORDER BY id");
$row = mysqli_fetch_array($result);

if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {
?>

<?php include("prof.php"); ?>

    <table class="flat-table container">
        <tbody>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Пол</th>
                <th>Дата рождения</th>
                <th>Действие</th>
            </tr>
            <?php do { ?>
                <tr>
                    <td><?php echo $row["fname"]; ?></td>
                    <td><?php echo $row["lname"]; ?></td>
                    <td><?php echo $row["tname"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["birthday"]; ?></td>
                    <td><a href="/page.php?id=<?php echo $row["id"]; ?>">Открыть</a></td>
                </tr>
            <?php } while ($row = mysqli_fetch_array($result)); {
            } ?>
        </tbody>
    </table>
<?php } else { echo '<a href="/login.php"> Авторизуйтесь </a>'; } ?>