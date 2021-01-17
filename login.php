<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 40%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        /* padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa; */

        width: 100%;
    }

    select {
        width: 100%;
    }


    .tab {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

</style>

<form id="regForm" method="POST" action="/auth.php">
    <h1>Авторизация</h1>
    <div class="">Шаг 1
        <p><input placeholder="Логин (admin)" name="login"></p>
        <p><input placeholder="Пароль (admin)" name="password" type="password"></p>
        <button  type="submit" name="submit">Войти</button>
    </div>

</form>