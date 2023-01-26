<html>
    <head>
        <?php
            include 'head.php';
            if($_POST){
                gameManager::link($_GET["id"], $_POST["game"]);
            }
            $id = $_GET["id"];
        ?>
    </head>
    <body>
        <main>
            <a href="index.php">
            <h1><?php
            echo customerManager::selectId($_GET["id"])->firstname, " ",customerManager::selectId($_GET["id"])->lastname;
            ?></h1> <br>
            </a>
            <form method="POST" class="gameForm">
                    <select name='game' id="game" class='form-control'>
                        <?php
                            $games = gameManager::select();
                                    foreach($games as $game){
                                        echo"<option value='$game->idgame'>$game->name ($game->platform)</option>";
                                    }
                        ?>
                </select> <br>
                <input type="submit" value="Toevoegen" class="btn btn-primary">
            </form>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>Game</th>
                    <th>Platform</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        $games = gameManager::select2($_GET["id"]);
                        foreach($games as $game){
                            echo "<tr>";
                            echo "<td>$game->name</td>";
                            echo "<td>$game->platform</td>";
                            echo "<td><a href='remove.php?id=$id&game=$game->idtable1'>
                            <button class='btn btn-danger'>X</button>
                            </a></td>";
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