<?php
include 'cms_includes/cms_needs.php';
$title = "Mój profil";

head();
?>
<div class="page-header">
    <h1>Profil użytkownika: <?php echo $user->get_user_name(); ?></h1>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading panel-color">Chcę przeczytać <span class="badge">4</span></div>
            <div class="panel-body">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?php echo UPLOADS_THUMB; ?>/book_1.jpg" alt="..." width="64">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">12 sposobów na supermózg. Jak przetrwać w pracy, domu i szkole</a></h4>
                    </div>
                </div>
                <hr />
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?php echo UPLOADS_THUMB; ?>/book_1.jpg" alt="..." width="64">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">12 sposobów na supermózg. Jak przetrwać w pracy, domu i szkole</h4>
                    </div>
                </div>
                <hr />
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?php echo UPLOADS_THUMB; ?>/book_2.jpg" alt="..." width="64">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">12 sposobów na supermózg. Jak przetrwać w pracy, domu i szkole</h4>
                    </div>
                </div>
                <hr />
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="<?php echo UPLOADS_THUMB; ?>/book_3.jpg" alt="..." width="64">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">12 sposobów na supermózg. Jak przetrwać w pracy, domu i szkole</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading panel-color">Ocenione <span class="badge">3</span></div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th></th>
                        <th>Tytuł</th>
                        <th width="15%">Ocena</th>
                        <th width="13%">Data</th>
                    </tr>
                    <tr>
                        <td><a href="#"><img src="<?php echo UPLOADS_THUMB; ?>/book_1.jpg" class="img-responsive" width="50" /></a></td>
                        <td><h4><a href="#">12 sposobów na supermózg. Jak przetrwać w pracy, domu i szkole</a></h4></td>
                        <td>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                        </td>
                        <td>01-02-2017</td>
                    </tr>
                    <tr>
                        <td><a href="#"><img src="<?php echo UPLOADS_THUMB; ?>/book_2.jpg" class="img-responsive" width="50" /></a></td>
                        <td><h4><a href="#">Genetyczne piekło. Biologia siedmiu grzechów głównych</a></h4></td>
                        <td>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                        </td>
                        <td>01-02-2017</td>
                    </tr>
                    <tr>
                        <td><a href="#"><img src="<?php echo UPLOADS_THUMB; ?>/book_3.jpg" class="img-responsive" width="50" /></a></td>
                        <td><h4><a href="#">Zegar życia. Dlaczego się starzejemy? Czy można cofnąć czas?</a></h4></td>
                        <td>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                        </td>
                        <td>01-02-2017</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php
footer();
?>