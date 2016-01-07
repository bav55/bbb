    <form class="form-horizontal" action="[[~[[*id]]]]" method="post">
        <input style="display:none;" type="text" name="email_" value="" />
        <div class="form-group">
            <label class="control-label col-xs-3" for="fullname">Имя и фамилия:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" id="fullname" placeholder="Введите ваши имя и фамилию" name="fullname" value="[[!+reg.fullname]]">
                <div class="text-error">[[!+reg.error.fullname:ne=``:then=`<br><div class="alert alert-danger"> <b>Ошибка! </b>[[+reg.error.fullname]]</div>`]]</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="email">Электронная почта:</label>
            <div class="col-xs-9">
                <input type="email" class="form-control" id="email" placeholder="Укажите ваш адрес электронной почты" name="email" value="[[!+reg.email]]">
                <div class="text-error">[[!+reg.error.email:ne=``:then=`<br><div class="alert alert-danger"> <b>Ошибка! </b>[[+reg.error.email]]</div>`]]</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="password">Пароль:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" id="password"  name="password" value="[[!+reg.password]]" placeholder="Введите пароль">
                <div class="text-error">[[!+reg.error.password:ne=``:then=`<br><div class="alert alert-danger"> <b>Ошибка! </b>[[+reg.error.password]]</div>`]]</div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="password_confirm">Подтвердите пароль:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" id="password_confirm" name="password_confirm"  value="[[!+reg.password_confirm]]" placeholder="Введите пароль ещё раз">
                <div class="text-error">[[!+reg.error.password_confirm:ne=``:then=`<br><div class="alert alert-danger"> <b>Ошибка! </b>[[+reg.error.password_confirm]]</div>`]]</div>
            </div>
        </div>
        <br />
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" name="registerbtn" value="Зарегистрироваться!">
                <input type="reset" class="btn btn-default" value="Очистить форму">
            </div>
        </div>
    </form>