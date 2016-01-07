<form class="form-horizontal" action="[[~[[*id]]]]" method="post">
    <input style="display:none;" type="text" name="email_" value="" />
    [[+errors]]
    <div class="form-group">
        <label class="control-label col-xs-3" for="username">Электронная почта:</label>
        <div class="col-xs-9">
            <input type="email" class="form-control" id="username" placeholder="Укажите ваш адрес электронной почты" name="username" value="[[+username]]">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3" for="password">Пароль:</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" id="password"  name="password" value="[[!+password]]" placeholder="Введите пароль">
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" name="Login" value="Войти на сайт">
            <input type="hidden" name="service" value="login" />
            &nbsp;&nbsp;&nbsp;<a href="[[~64]]">Забыли пароль?</a>
        </div>
    </div>

</form>