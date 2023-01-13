<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="container-fluid" style="margin-left: 9.5%;">
            <a class="navbar-brand" href="#">B1</a>

            <div class="collapse navbar-collapse" style="margin-left: 5%">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?command=SHOW_RECORDS_PAGE">Данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?command=SHOW_UPLOADS_PAGE">Файлы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?command=SHOW_FAQ_PAGE">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container">
        <div class="container-fluid" style="margin-top:10%">