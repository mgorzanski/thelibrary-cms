<?php
include 'cms_includes/cms_needs.php';

if(isset($_POST['add_to_list_user_wants_to_read']))
{
    $user->add_to_list_user_wants_to_read($_GET['book_id']);
}
elseif(isset($_POST['remove_from_list_user_wants_to_read']))
{
    $user->remove_from_list_user_wants_to_read($_GET['book_id']);
}

$books->get_current_book();
$title = $books->current_book['title'];

head();
?>
    <div class="row">
        <div class="col-md-2">
            <?php
            if(!empty($books->current_book['thumbnail_url'])):
            ?>
            <img src="<?php echo $books->current_book['thumbnail_url']; ?>" class="img-responsive" alt="<?php echo $books->current_book['title']; ?>" />
            <?php else: ?>
            <img src="<?php echo UPLOADS_THUMB; ?>/no_thumbnail.png" class="img-responsive" alt="<?php echo $books->current_book['title']; ?>" />
            <?php endif; ?>
            <?php if(!$user->rated_book($_GET['book_id'])): ?>
            <!--<form action="" method="post">-->
                <?php if($user->book_is_on_user_list($_GET['book_id'])): ?>
                <button name="remove_from_list_user_wants_to_read" class="btn btn-danger btn-block btn-rate" type="submit">Usuń z listy</button>
                <?php else: ?>
                <button name="add_to_list_user_wants_to_read" class="btn btn-success btn-block btn-rate" type="submit">Chcę przeczytać</button>
                <?php endif; ?>
            <!--</form>-->
            <?php else: ?>
            <button onClick="delete_vote(<?php echo $_GET['book_id']; ?>);" class="btn btn-danger btn-block btn-rate" type="submit">Usuń ocenę</button>
            <?php endif; ?>
            <p class="text-center no-margin my-rate">
            <?php if($user->rated_book($_GET['book_id'])): ?>
            Moja ocena
            <?php else: ?>
            Oceń tą książkę
            <?php endif; ?>
            </p>
            <p id="rate-book" class="text-center">
                <?php
                if($user->rated_book($_GET['book_id'])):
                $current_star = 1;
                $user_vote = $books->get_vote_by_user_id($_SESSION['user_id']);
                $current_star_not_empty = 1;
                $stars = '';

                while($current_star<=5)
                {
                    if($current_star_not_empty<=$user_vote)
                    {
                        $stars .= '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;';
                        $current_star_not_empty++;
                    }
                    else
                    {
                        if($current_star==5)
                        {
                            $stars .= '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
                        }
                        else
                        {
                            $stars .= '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>&nbsp;';
                        }
                    }
                    $current_star++;
                }

                echo $stars;
                else:
                ?>
                <span class="glyphicon glyphicon-star-empty rate" id="star-1" onClick="rate(1, <?php echo $_GET['book_id']; ?>, 1);" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star-empty rate" id="star-2" onClick="rate(2, <?php echo $_GET['book_id']; ?>, 2);" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star-empty rate" id="star-3" onClick="rate(3, <?php echo $_GET['book_id']; ?>, 3);" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star-empty rate" id="star-4" onClick="rate(4, <?php echo $_GET['book_id']; ?>, 4);" aria-hidden="true"></span>
                <span class="glyphicon glyphicon-star-empty rate" id="star-5" onClick="rate(5, <?php echo $_GET['book_id']; ?>, 5);" aria-hidden="true"></span>
                <?php endif; ?>
            </p>
            <?php
            if(!empty($books->current_book['preview_url'])):
            ?>
            <hr />
            <a class="btn btn-default btn-block" href="<?php echo $books->current_book['preview_url']; ?>">Podgląd</a>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <h3 class="no-margin"><b><?php echo $books->current_book['title']; ?></b></h3>
            <h5>Autor: <?php if($books->current_book['author_id'] == null):echo $books->current_book['author'];else:echo"<a href=\"view_author.php?author_id=".$books->current_book['author_id']."\">".$books->current_book['author']."</a>"; endif; ?></h5>
            <?php $average_of_votes = $books->get_votes_average($books->current_book['id']); ?>
            <?php $number_of_votes = $books->get_votes_count($books->current_book['id']); ?>
            <?php $number_of_reviews = $books->get_reviews_count($books->current_book['id']); ?>
            <p>
                <?php
                $number_of_all_stars = 5;
                $current_star = 1;
                $number_of_stars = $books->get_votes_stars($books->current_book['id']);
                $current_star_not_empty = 1;
                $stars = '';

                while($current_star<=5)
                {
                    if($current_star_not_empty<=$number_of_stars)
                    {
                        $stars .= '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                        $current_star_not_empty++;
                    }
                    else
                    {
                        $stars .= '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
                    }
                    $current_star++;
                }

                echo $stars;
                ?>
                <span><?php echo $average_of_votes; ?></span>
                <span>|</span>
                <span>
                <?php
                if($number_of_votes==1) {
                    echo $number_of_votes.' głos';
                } elseif($number_of_votes==0) {
                    echo $number_of_votes.' głosów';
                } elseif($number_of_votes>1&&$number_of_votes<5) {
                    echo $number_of_votes.' głosy';
                } else {
                    echo $number_of_votes.' głosów';
                }
                ?>    
                </span>
                <span>|</span>
                <span><a href="#reviews">
                <?php
                if($number_of_reviews==1) {
                    echo $number_of_reviews.' recenzja';
                } elseif($number_of_reviews==0) {
                    echo $number_of_reviews.' recenzji';
                } elseif($number_of_reviews>1&&$number_of_reviews<5) {
                    echo $number_of_reviews.' recenzje';
                } else {
                    echo $number_of_reviews.' recenzji';
                }
                ?>    
                </a></span>
            </p>

            <p class="book-description">
            <?php echo $books->current_book['description']; ?>
            </p>

            <hr class="no-margin" />

            <p class="hr-margin">
            Liczba stron: <?php echo $books->current_book['number_of_pages']; ?>
            <br />
            Data wydania: <?php echo $books->current_book['release_date']; ?>
            <br />
            Kategoria: <a href="browse_catalog.php?category_id=<?php echo $books->current_book['category_id']; ?>"><?php echo $books->current_book['category_name']; ?></a>
            <br />
            Język: <?php echo $books->current_book['language']; ?>
            </p>

            <hr class="no-margin" />

            <p class="hr-margin"><b>Szukaj w sklepie: </b>
                <a class="btn btn-default" href="http://allegro.pl/listing?string=<?php echo $books->current_book['title']; ?>">Allegro</a>
                <a class="btn btn-default" href="https://www.olx.pl/oferty/q-<?php echo $books->current_book['title']; ?>/">OLX</a>
            </p>
            <hr class="no-margin" />

            <h4 id="reviews" class="hr-margin">Recenzje (<?php echo $number_of_reviews; ?>)</h4>

            <hr class="no-margin" />

            <div class="reviews">
                <?php foreach($books->current_book_reviews as $review): ?>
                <div id="1" class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="review-user"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<span><a href="profile.php?user_id=<?php echo $review['user_id']; ?>"><?php echo $books->get_user_name_by_id($review['user_id']); ?></a></span></p>
                            </div>
                            <div class="col-md-6 text-right">
                                <?php
                                $current_star = 1;
                                $review_vote = $books->get_vote_by_user_id($review['user_id']);
                                $current_star_not_empty = 1;
                                $stars = '';

                                while($current_star<=5)
                                {
                                    if($current_star_not_empty<=$review_vote)
                                    {
                                        $stars .= '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                                        $current_star_not_empty++;
                                    }
                                    else
                                    {
                                        $stars .= '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
                                    }
                                    $current_star++;
                                }

                                echo $stars;
                                ?>
                            </div>
                        </div>
                        <p><?php echo $review['description']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <?php if(!$number_of_reviews == 0): ?>
            <hr />
            <?php endif; ?>

            <h5>Dodaj recenzję:</h5>
            <form action="add_review.php" method="post">
                <div class="form-group">
                    <textarea class="form-control" rows="9"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Wyślij</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <p class="text-right"><a href="report_an_error.php?book_id=<?php echo $books->current_book['id']; ?>">Zgłoś błąd</a> | <i>Ostatnia edycja: <?php echo $books->current_book['last_edit']; ?></i></p>

            <?php
            $other_books = $books->get_author_books_except_current();

            if($other_books!=false):
            echo
            '<h4 class="other-books"><b>Inne książki tego autora</b></h4>

            <hr class="no-margin" />

            <div class="row hr-margin-2">';
            foreach($books->other_books as $book):
            ?>
                <div class="col-md-4">
                    <a href="view_book.php?book_id=<?php echo $book['id']; ?>">
                    <?php
                    if(!empty($book['thumbnail_url'])):
                    ?>
                    <img src="<?php echo $book['thumbnail_url']; ?>" alt="<?php echo $book['title']; ?>" class="img-responsive" />
                    <?php else: ?>
                    <img src="<?php echo UPLOADS_THUMB; ?>/no_thumbnail.png" class="img-responsive" alt="<?php echo $book['title']; ?>" />
                    <?php endif; ?>
                    </a>
                </div>
            <?php endforeach;;
            echo 
            '</div>
            <p class="text-right"><small><a href="view_author.php?author_id='.$books->current_book['author_id'].'#books"><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>Pokaż więcej książek tego autora</a></small></p>';
            endif;
            ?>

            <?php if($books->current_book['author_id'] != null): ?>
            <hr class="no-margin" />

            <h4><b>O autorze</b></h4>

            <hr class="no-margin" />
            
            <p class="hr-margin">
                <?php echo $books->get_author_biography_by_author_id($books->current_book['author_id']); ?>
            </p>
            <p class="text-right"><small><a href="view_author.php?author_id=<?php echo $books->current_book['author_id']; ?>"><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>Pokaż stronę autora</a></small></p>
            <?php endif; ?>

            <?php if($books->current_book['author_id'] == null): ?>
            <h4 class="categories"><b>Przejdź do kategorii</b></h4>
            <hr class="no-margin" /><br />

            <?php else: ?>

            <hr class="no-margin" />
            <h4><b>Przejdź do kategorii</b></h4>
            <hr class="no-margin" /><br />
            <?php endif; ?>

            <ul class="nav nav-pills nav-stacked">
            <?php
            $categories = $books->get_categories();
            foreach($categories as $category):
            ?>
                <li><a href="browse_catalog.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php
footer();
?>