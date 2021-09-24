<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="assets/img/logo.png">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="div-sec-left"></div>
    <section class="sec-container-div">
        <div class="container-login">
            <div class="left-login">
                <div class="logo">  <img src="assets/img/logo.png" /> </div>
                <h1>Sistema de Inscrição</h1>
                <p>CopyRight@2021</p>
            </div>

            <form id="frmLogin" class="right-login">
                <b>LOGIN</b>

                <div class="label-container">
                    <label>Email</label>
                </div>

                <div class="input-container">
                    <input name="email" required type="email" placeholder="ex.: jose@gmail.com" /> <i class="fas fa-envelope"></i> 
                </div>

                <div class="label-container">
                    <label>Palavra Passe</label>
                </div>
                <div class="input-container">
                    <input name="password" required minLength="6" type="password" placeholder="ex.: domingos.364" /> <i class="fas fa-lock"></i>
                </div>

                <div class="btn-deste">
                    <button type="submit" class="btn-entrar">Entrar</button>
                </div>

                <div class="forget-container"><a href=""> Esqueceu a senha ? </a></div>

            </form>
        </div>
    </section>
 
    <script src="assets\js\jquery-3.6.0.js"></script>
    <script src="assets\scripts\util.js"></script> 
    <script src="assets\scripts\login.js"></script>
</body>
</html>