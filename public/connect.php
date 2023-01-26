<html>
    <head>
        <?php
            include 'head.php';
        ?>
    </head>
    <body>
        <main>
            <h1>Naam</h1>
            <form method="POST" class="connectForm">
                <select id="games" class="form-control">
                    <option value="1">dsaf</option>
                </select> <br>
                <input type="submit" class="btn btn-primary">
            </form>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>Naam</th>
                    <th>Platform</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>test</td>
                        <td>test</td>
                        <td>
                            <button class="btn btn-danger">X</button>
                        </td>
                    </tr>
                </tbody>
            </table>
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