<html>
    <head>
        <?php
            include 'head.php';
            if($_POST){
                customerManager::insert($_POST);
            }
        ?>
    </head>
    <body>
        <main>
            <a href="index.php">
                <h1>Klant toevoegen</h1>
            </a>
            <form method="POST" class="insertForm">
                <label for="firstname">Voornaam</label> <br>
                <input type="text" placeholder="Voornaam" id="firstname" class="form-control" name="firstname"> <br>
                <label for="lastname">Achternaam</label> <br>
                <input type="text" placeholder="Achternaam" id="lastname" class="form-control" name="lastname"> <br>
                <label for="email">Email</label> <br>
                <input type="email" placeholder="Email" id="email" class="form-control" name="email"> <br>
                <label for='country'>Land</label> <br>
                    <select name='country' class='form-control'>
                        <?php
                            $countrys = countryManager::select();
                                    foreach($countrys as $country){
                                        if($customer->country_idcountry == $country->idcountry){
                                            echo "<option selected value='$country->idcountry'>$country->name</option>";
                                        }else{
                                            echo"<option value='$country->idcountry'>$country->name</option>";
                                        }
                                    }
                        ?>
                </select> <br> <br>
                <label for="premium_member">Premium klant</label>
                <input type="checkbox" id="premium_member" name="premium_member"> <br> <br>
                <input type="submit" class="btn btn-primary" value="Opslaan">
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