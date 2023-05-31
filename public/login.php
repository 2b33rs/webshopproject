<?php include_once 'structure/head.php' ?>

<body>
    <div class="container">
        <?php include_once 'structure/header.php' ?>
        <main>

            <!-- Login -->
            <div class="card">
                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <div class="card-body">

                    <form class="row g-3 " action="loginScript.php" method="GET">
                        <div class="col-md-4">
                            <label for="username" class="form-label">Benutzername</label>
                            <input type="text" class="form-control" id="username" autofocus autocomplete="on"
                                tabindex="1">
                        </div>
                        <div class="col-md-4">
                            <label for="password" class="form-label">Passwort</label>
                            <input type="password" class="form-control" id="password" autocomplete="off" tabindex="2">
                        </div>
                        <div>
                            <input type="submit" name="loginbtn" value="Login" tabindex="3">
                        </div>
                    </form>
                </div>
            </div>


</body>

</html>