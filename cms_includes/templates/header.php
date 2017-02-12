<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title><?php echo $GLOBALS['title']; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo INC_TEMPLATES_CSS; ?>/default.css" type="text/css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navigation" aria-expanded="false">
                        <span class="sr-only">Pokaż nawigację</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">TheLibrary</a>
                </div>

                <div class="collapse navbar-collapse" id="header-navigation">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Strona główna</a></li>
                        <li><a href="profile.php">Mój profil</a></li>
                        <li><a href="browse_catalog.php">Przeglądaj książki</a></li>
                        <li><a href="discussions.php">Dyskusje</a></li>
                    </ul>
                    <form method="get" action="search.php" class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Szukaj" />
                        </div>
                        <button type="submit" class="btn btn-default">Szukaj</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Moje konto <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="settings.php">Przejdź do ustawień</a></li>
                                <li><a href="logout.php">Wyloguj się</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">Logowanie</a></li>
                        <li><a href="create_account.php">Utwórz konto</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="main">
    <div class="container">