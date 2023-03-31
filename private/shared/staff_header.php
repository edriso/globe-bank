<?php
    if(!isset($page_title)) {
        $page_title = 'Staff Area';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>GBI - <?php echo $page_title ;?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <h3 class="mb-0">GBI Staff Area</h3>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Menu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-4">