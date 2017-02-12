    </div>
    </section>
    <footer>
        <p class="text-center">Napisał i zakodował Mateusz Górzański.</p>
        <p class="text-center">Copyright &copy; 2017 Mateusz Górzański. Wszystkie prawa zastrzeżone.</p>
    </footer>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="login.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Zamknij"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Logowanie</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="inputLoginUserName">Nazwa użytkownika</label>
            <input type="text" class="form-control" id="inputLoginUserName" name="loginUserName" />
        </div>
        <div class="form-group">
            <label for="inputPasswordUserName">Hasło</label>
            <input type="password" class="form-control" id="inputPasswordUserName" name="loginPassword" />
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="previous_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
        <button type="submit" class="btn btn-primary">Zaloguj się</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo INC_JS; ?>/delete_vote.js"></script>
<script src="<?php echo INC_JS; ?>/stars_hover.js"></script>
<script src="<?php echo INC_JS; ?>/rate_book.js"></script>
</body>
</html>