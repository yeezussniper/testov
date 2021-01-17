<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
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

    textarea {
        width: 100%;
    }

    input.invalid {
        background-color: #ffdddd;
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

    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    .step.finish {
        background-color: #4CAF50;
    }
</style>

<header>

</header>

<body>
    <?php include("prof.php"); ?>

    <form id="regForm" method="POST" action="/reguser.php" enctype="multipart/form-data">
        <h1>Заполнение анкеты:</h1>
        <div class="tab">Шаг 1
            <p><input placeholder="Имя" oninput="this.className = ''" name="fname"></p>
            <p><input placeholder="Фамилия" oninput="this.className = ''" name="lname"></p>
            <p><input placeholder="Отчество" oninput="this.className = ''" name="tname"></p>
            <p><input type="date" oninput="this.className = ''" name="birthday"></p>
            <p>
                <select name="gender">
                    <option selected disabled>Выберите пол*</option>
                    <option value="мужской">Мужской</option>
                    <option value="женский">Женский</option>
                </select>
            </p>
        </div>
        <div class="tab">Шаг 2
            <p><input type="file" name="path"></p>
            <p><input type="color" name="lovecolor" /></p>
        </div>
        <div class="tab">Шаг 3
            <p><textarea rows="10" name="merit" placeholder="Ваши личные качества"></textarea></p>
            <p>
                <input type="checkbox" name="options[]" value="усидчивость">усидчивость<Br>
                <input type="checkbox" name="options[]" value="опрятность">опрятность<Br>
                <input type="checkbox" name="options[]" value="самообучаемость">самообучаемость<Br>
                <input type="checkbox" name="options[]" value="трудолюбие">трудолюбие
            </p>
            </p>
        </div>
        <div class="tab">Шаг 4
            <p><input type="file" name="path2[]" multiple accept="image/*,image/jpeg"></p>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Вернуться</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Далее</button>
            </div>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

    <script>
        var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Завершить регистрацию";
            } else {
                document.getElementById("nextBtn").innerHTML = "Далее";
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("regForm").submit();
                return false;
            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    // valid = false;
                    valid = true;
                }
            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

</body>

</html>