<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Form</title>
</head>
<body>
    <header>
        <div class="header_wrap">
            <div class="logo">
                <a href="https://www.azuf.az/" class="logo__link">
                    <img class="logo_img" src="./img/logo.webp" alt="logo">
                </a>
            </div>
            <div class="language">
                <div class="language__links">
                    <a href="#!">AZ</a>
                    <a href="#!" class="deactive">RU</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="main_wrap">
            <form enctype="multipart/form-data" action="./api.php" method="post">
                <div class="form_row">
                    <div class="form_col">
                        <label class="input_lab" for="first_name">Имя</label>
                        <input type="text" placeholder="Мурад" id="first_name" name="first_name">
                    </div>                
                    <div class="form_col">
                        <label class="input_lab" for="last_name">Фамилия</label>
                        <input type="text" placeholder="Мурадов" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="form_row">
                    <div class="form_col">
                        <label class="input_lab" for="mail">E-Mail</label>
                        <input required type="email" placeholder="murad_muradov@mail.com" id="mail" name="mail">
                    </div>                
                    <div class="form_col">
                        <label class="input_lab" for="phone">Телефон</label>
                        <input type="tel" value="+994 (" id="phone" name="phone">
                    </div>
                </div>
                <div class="form_row">
                    <div class="form_col">
                        <label class="input_lab" for="fin">FIN</label>
                        <input type="text" placeholder="SD545C" maxlength="6" minlength="6" id="fin" name="fin">
                    </div> 
                    <div class="form_col">
                        <label class="input_lab" for="sum">Сумма</label>
                        <input step="1"  type="number" id="payment" name="payment" >
                    </div>                
                </div>
                <div class="form_row">
<!--                    <div class="form_col check">-->
<!--                        <label for="check">-->
<!--                        <input type="checkbox" id="check" name="check">Пожертвовать анонимно</label>-->
<!--                    </div>-->
                    <div class="form_col">
                        <input class="submit" type="submit" value="Перейти к оплате">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer>

    </footer>

    <script src="https://unpkg.com/imask"></script>
    <script src="./js/script.js"></script>

</body>
</html>