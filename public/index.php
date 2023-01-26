<html>
    <head>
        <?php
            include 'head.php';
        ?>
    </head>
    <body>
        <main>
            <div class="indexTopRow">
                <a href="logout.php">
                    <h1>Klanten</h1>
                </a>
                <a href="insert.php">
                    <button class="btn btn-primary">+ Toevoegen</button>
                </a>
            </div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Premium</th>
                    <th>Land</th>
                    <th>Aantal games</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        $customers = customerManager::select();
                        foreach($customers as $customer){
                            $count = gameManager::count($customer->idcustomer)->nr;
                            echo "<tr>";
                            echo "<td>$customer->firstname</td>";
                            echo "<td>$customer->lastname</td>";
                            echo "<td>$customer->email</td>";
                            if($customer->premium_member){
                                echo "<td>Ja</td>";
                            } else{
                                echo "<td>Nee</td>";
                            }
                            echo "<td>$customer->name</td>";
                            echo "<td>$count</td>";
                            echo "<td><button class='btn btn-primary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            Opties
                            </button>
                            <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='update.php?id=$customer->idcustomer'>Klant wijzigen</a></li>
                            <li><a class='dropdown-item' href='delete.php?id=$customer->idcustomer'>Klant verwijderen</a></li>
                            <li><a class='dropdown-item' href='games.php?id=$customer->idcustomer'>Mijn games</a></li>
                            <li><a class='dropdown-item' href='mail.php?id=$customer->idcustomer&email=$customer->email'>Stuur email</a></li>
                            </ul></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </main>
        <footer>
            <a href="index.php">home</a>
            <a href="insert.php">toevoegen</a>
            <a href="update.php">aanpassen</a>
            <a href="connect.php">koppelen</a>
            <a href="login.php">koppelen</a>
        </footer>
    </body>
</html>