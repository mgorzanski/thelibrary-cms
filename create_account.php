<?php
include 'cms_includes/cms_needs.php';
$title = "Utwórz konto";

if(isset($_POST['user_name']))
{
    $user->create_account($_POST);
}

head();
?>
    <ol class="breadcrumb">
        <li><a href="index.php">Strona główna</a></li>
        <li>Konto</li>
        <li class="active">Zarejestruj się</a></li>
    </ol>
    <?php if($user->registration_statement==5): ?>
    <div class="alert alert-success" role="alert">
        <strong>Pomyślnie utworzono konto!</strong>&nbsp;Wróć do <a href="index.php">strony głównej</a>.
    </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Utwórz konto</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post" class="form-horizontal">
                <?php if($user->registration_statement==1 or $user->registration_statement==3): ?>
                <div class="form-group has-error">
                <?php else: ?>
                <div class="form-group">
                <?php endif; ?>
                    <label for="inputUserName" class="col-sm-2 control-label">Nazwa użytkownika</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUserName" name="user_name" value="<?php if(!empty($_POST['user_name'])):echo $_POST['user_name'];endif; ?>" />
                        <?php if($user->registration_statement==1):if(empty($_POST['user_name'])): ?>
                        <span class="help-block">Proszę wypełnić to pole.</span>
                        <?php endif; endif; ?>
                        <?php if($user->registration_statement==3): ?>
                        <span class="help-block">Nazwa użytkownika jest już zajęta.</span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($user->registration_statement==1 or $user->registration_statement==4): ?>
                <div class="form-group has-error">
                <?php else: ?>
                <div class="form-group">
                <?php endif; ?>
                    <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" value="<?php if(!empty($_POST['email'])):echo $_POST['email'];endif; ?>" />
                        <?php if($user->registration_statement==1):if(empty($_POST['email'])): ?>
                        <span class="help-block">Proszę wypełnić to pole.</span>
                        <?php endif; endif; ?>
                        <?php if($user->registration_statement==4): ?>
                        <span class="help-block">Podany e-mail został już użyty.</span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($user->registration_statement==1): ?>
                <div class="form-group has-error">
                <?php else: ?>
                <div class="form-group">
                <?php endif; ?>
                    <label for="inputPassword" class="col-sm-2 control-label">Hasło</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="password" value="<?php if(!empty($_POST['password'])):echo $_POST['password'];endif; ?>" />
                        <?php if($user->registration_statement==1):if(empty($_POST['password'])): ?>
                        <span class="help-block">Proszę wypełnić to pole.</span>
                        <?php endif; endif; ?>
                    </div>
                </div>
                <?php if($user->registration_statement==1 or $user->registration_statement==2): ?>
                <div class="form-group has-error">
                <?php else: ?>
                <div class="form-group">
                <?php endif; ?>
                    <label for="inputRepeatPassword" class="col-sm-2 control-label">Powtórz hasło</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputRepeatPassword" name="repeat_password" value="<?php if(!empty($_POST['repeat_password'])):echo $_POST['repeat_password'];endif; ?>" />
                        <?php if($user->registration_statement==1):if(empty($_POST['repeat_password'])): ?>
                        <span class="help-block">Proszę wypełnić to pole.</span>
                        <?php endif; endif; ?>
                        <?php if($user->registration_statement==2): ?>
                        <span class="help-block">Podane hasła nie zgadzają się.</span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($user->registration_statement==1): ?>
                <div class="form-group has-error">
                <?php else: ?>
                <div class="form-group">
                <?php endif; ?>
                    <label for="inputDateOfBirth" class="col-sm-2 control-label">Data urodzenia</label>
                    <div class="col-sm-10">
                        <div class="row">
                        <div class="col-xs-2">
                        <select class="form-control" name="dob_day">
                            <option value="-">-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <?php if($user->registration_statement==1):if($_POST['dob_day']=='-'): ?>
                        <span class="help-block">Proszę wypełnić to pole.</span>
                        <?php endif; endif; ?>
                        </div>
                        <div class="col-xs-2">
                        <select class="form-control" name="dob_month">
                            <option value="-">-</option>
                            <option value="1">Styczeń</option>
                            <option value="2">Luty</option>
                            <option value="3">Marzec</option>
                            <option value="4">Kwiecień</option>
                            <option value="5">Maj</option>
                            <option value="6">Czerwiec</option>
                            <option value="7">Lipiec</option>
                            <option value="8">Sierpień</option>
                            <option value="9">Wrzesień</option>
                            <option value="10">Październik</option>
                            <option value="11">Listopad</option>
                            <option value="12">Grudzień</option>
                        </select>
                        <?php if($user->registration_statement==1):if($_POST['dob_month']=='-'): ?>
                        <span class="help-block">Proszę wypełnić to pole.</span>
                        <?php endif; endif; ?>
                        </div>
                        <div class="col-xs-2">
                        <select class="form-control" name="dob_year">
                            <option value="-">-</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                        </select>
                        <?php if($user->registration_statement==1):if($_POST['dob_year']=='-'): ?>
                        <span class="help-block">Proszę wypełnić to pole.</span>
                        <?php endif; endif; ?>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Utwórz</button>
                        <button type="reset" class="btn btn-default">Resetuj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
footer();
?>