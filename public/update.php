<html>
    <head>
        <?php
            include 'head.php';
            if($_POST){
                customerManager::update($_POST, $_GET["id"]);
            }
        ?>
    </head>
    <body>
        <main>
            <a href="index.php">
                <h1>Klant wijzigen</h1>
            </a>
            <form method="POST" class="updateForm">
                <?php
                $customer = customerManager::selectId($_GET["id"]);
                $countrys = countryManager::select();
                echo "
                    <label for='firstname'>Voornaam</label> <br>
                    <input type='text' placeholder='Voornaam' id='firstname' class='form-control' name='firstname' value='$customer->firstname'> <br>
                    <label for='lastname'>Achternaam</label> <br>
                    <input type='text' placeholder='Achternaam' id='lastname' class='form-control' name='lastname' value='$customer->lastname'> <br>
                    <label for='email'>Email</label> <br>
                    <input type='email' placeholder='Email' id='email' class='form-control' name='email' value='$customer->email'> <br>
                    <label for='country'>Land</label> <br>
                    <select name='country' class='form-control'>";
                                    foreach($countrys as $country){
                                        if($customer->country_idcountry == $country->idcountry){
                                            echo "<option selected value='$country->idcountry'>$country->name</option>";
                                        }else{
                                            echo"<option value='$country->idcountry'>$country->name</option>";
                                        }
                                    }
                echo "</select> <br> <br>
                    <label for='premium_member'>Premium klant</label>";
                    if($customer->premium_member == 1){
                        echo "<input type='checkbox' id='premium_member' checked name='premium_member'> <br> <br>";
                    } else{
                        echo "<input type='checkbox' id='premium_member' name='premium_member'> <br> <br>";
                    }
                echo "
                    <input type='submit' class='btn btn-primary' value='Bijwerken'>
                    ";

                ?>
            </form>
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