<html>
    <head>
        <title>Ratjetoe</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <?php
            require_once "../static/db.php";

            if($_POST) {
                $stmt = $con->prepare("select * from user where email=?");
                $stmt->bindvalue(1, $_POST["email"]);
                $stmt->execute();
        
                $user = $stmt->fetchObject();
                if($user !== false) {
                        if(password_verify($_POST["password"], $user->password_hash)) {
                            session_start();
                            $_SESSION["login_id"] = $user->iduser;
                            header("location: index.php");
                        }
                    }
                }
        ?>
    </head>
    <body>
        <main class="login">
            <div class="loginBox">
                <div class="loginLogo">
                    <img src="EPS_ICTCampus_CMYK.jpg" alt="logo">
                </div>
                <?php
                        if($_POST){
                            echo "
                            <div class='notif'>
                                <span class='material-symbols-outlined'>
                                warning
                                </span>
                                Kan niet inloggen met deze gegevens
                            </div>
                            ";
                        }
                    ?>
                <div class="loginForm">
                    <form method="POST">
                        <label for="email">E-mailadress</label> <br>
                        <input type="email" id="email" name="email" class="form-control"> <br>
                        <label for="password">Wachtwoord</label> <br>
                        <input type="password" id="password" name="password" class="form-control"> <br>
                        <input type="submit" class="btn btn-primary" value="Inloggen">
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <a href="index.php">home</a>
            <a href="insert.php">toevoegen</a>
            <a href="update.php">aanpassen</a>
            <a href="connect.php">koppelen</a>
            <a href="login.php">login</a>
        </footer>
    </body>
</html>