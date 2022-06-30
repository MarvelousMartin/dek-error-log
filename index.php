<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>DEKLog</title>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/dek.jpg" alt="logo">
                    &nbsp;&nbsp;Error logger
                </a>
            </div>
            <!--
            <ul class="nav navbar-nav">
                <li><a href="#">Lorem</a></li>
                <li><a href="#">Ipsum</a></li>
            </ul>
            -->
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16" opacity="0.1">
                <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
                <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
            </svg>
        </div>
    </nav>
</header>

<section id="error-list">
    <div class="container">
        <div class="row">
            <div>
                <h1 style="display: inline-block">Log</h1>
                <a id="dropdownMenuLink" class="btn align-self-center" href="#" role="button" style="float: right">
                    <svg style="float: right" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="lightgrey" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                    </svg>
                </a>
            </div>
        </div>
        <hr class="hr">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Datum</th>
                            <th style="padding: 8px 20px">Kód</th>
                            <th>Popis chyby</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $servername = "mad.dek.cz";
                        $username = "mad";
                        $password = $_ENV['PASSWORD'];

                        // Create connection
                        $conn = new mysqli($servername, $username, $password);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM madtest.`error-log`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $counter = 1;
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["date"] . "</td>";
                                echo '<td style="padding: 8px 20px">' . $row["code"] . "</td>";
                                echo "<td>" . $row["description"] .'<button id="'.$counter.'" type="button" class="btn btn-error">Přiřadit se na úkol</button>'."</td>";
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
</body>

<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</html>