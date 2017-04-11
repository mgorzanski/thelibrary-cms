<?php
include 'cms_includes/cms_needs.php';
$title = "Zresetuj hasło";

if(isset($_POST['reset_email']))
{
    $user->send_reset_password_email($_POST['reset_email']);
}

head();
?>
    <ol class="breadcrumb">
        <li><a href="index.php">Strona główna</a></li>
        <li>Konto</li>
        <li class="active">Zresetuj hasło</a></li>
    </ol>

    <?php
    if(!empty($_GET['action']) && $_GET['action'] == 'reset_password'):
        if(!empty($_GET['email']) && !empty($_GET['session_id'])): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Zresetuj hasło</h3>
            </div>
            <div class="panel-body">
                <p>Użyj poniższego formularza, aby zmienić hasło do Twojego konta.</p>
                <form action="" method="post" class="form-horizontal">
                    <?php if(!empty($user->reset_password_statement) && $user->reset_password_statement=='wrong_email'): ?>
                    <div class="form-group has-error">
                    <?php else: ?>
                    <div class="form-group">
                    <?php endif; ?>
                        <label for="inputResetEmail">Nowe hasło</label>
                        <input type="email" class="form-control" id="inputResetEmail" name="reset_email" value="<?php if(!empty($_POST['user_name'])):echo $_POST['user_name'];endif; ?>" size="35" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Wyślij</button>
                    </div>
                </form>
            </div>
        </div>
        <?php else: header('Location: index.php'); ?>
        <?php endif;
    else: ?>
    <?php if(!empty($user->reset_password_statement) && $user->reset_password_statement=='wrong_email'): ?>
    <div class="alert alert-danger" role="alert">
    Podany adres e-mail nie został wykorzystany do stworzenia konta.
    </div>
    <?php elseif(!empty($user->reset_password_statement) && $user->reset_password_statement=='send_reset_password_success'): ?>
    <div class="alert alert-success" role="alert">
    Na adres <strong><?php echo $_POST['reset_email']; ?></strong> został wysłany link umożliwiający zmianę hasła.
    </div>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Zresetuj hasło</h3>
        </div>
        <div class="panel-body">
            <p>Jeśli nie pamiętasz swojego hasła, możesz je tutaj zresetować. Podaj e-mail, który użyłeś do rejestracji, a wyślemy na niego wiadomość z linkiem do zmiany hasła.</p>
            <form action="" method="post" class="form-inline">
                <?php if(!empty($user->reset_password_statement) && $user->reset_password_statement=='wrong_email'): ?>
                <div class="form-group has-error">
                <?php else: ?>
                <div class="form-group">
                <?php endif; ?>
                    <label for="inputResetEmail">E-mail</label>
                    <input type="email" class="form-control" id="inputResetEmail" name="reset_email" value="<?php if(!empty($_POST['user_name'])):echo $_POST['user_name'];endif; ?>" size="35" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Wyślij</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
<?php
footer();
?>