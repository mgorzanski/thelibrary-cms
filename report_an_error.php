<?php
include 'cms_includes/cms_needs.php';
$title = "Zgłoś błąd";

if(empty($_GET['book_id']))
{
    header('Location: index.php');
}

$books->get_current_book();

head();
?>
    <?php
    if(isset($_POST['submit']))
    {

    }
    elseif(isset($_POST['cancel']))
    {
        header('Location: view_book.php?book_id='.$_POST['book_id']);
    }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Zgłoś błąd dotyczący książki:</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="report-an-error-book">
                    <?php if(!empty($books->current_book['thumbnail_url'])): ?>
                    <img src="<?php echo $books->current_book['thumbnail_url']; ?>" class="img-responsive small-cover" alt="<?php echo $books->current_book['title']; ?>" />
                    <?php else: ?>
                    <img src="<?php echo UPLOADS_THUMB; ?>/no_thumbnail.png" class="img-responsive small-cover" alt="<?php echo $books->current_book['title']; ?>" />
                    <?php endif; ?>
                </div>
                <div class="report-an-error-description">
                    <h3 class="no-margin"><b><?php echo $books->current_book['title']; ?></b></h3>
                    <h5>Autor: <?php if($books->current_book['author_id'] == null):echo $books->current_book['author'];else:echo $books->current_book['author']; endif; ?></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Opisz występujący problem:</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="comment">Komentarz</label>
                    <textarea class="form-control" rows="12" id="comment-area"></textarea>
                    <input type="hidden" name="book_id" value="<?php echo $_GET['book_id']; ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" id="submit">Wyślij</button>
                <button type="submit" name="cancel" class="btn btn-danger">Anuluj</button>
            </form>
        </div>
    </div>
<?php
footer();
?>