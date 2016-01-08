[[!UpdateProfile?&preHooks=`uploadPhoto,enablehtml`
]]

[[+login.update_success:eq=`1`:then=`<div class="alert alert-success"><p>[[%login.profile_updated? &namespace=`login` &topic=`updateprofile`]]</p>
    <p>Вы будете перенаправлены на <a href="[[~81]]">страницу ваших настроек</a> <span id="timer_inp">через <b>2</b> секунд</span></p>
    <script type="text/javascript">
        setTimeout('document.getElementById("timer_inp").innerHTML = "через <b>1</b> секунды"', 1000);
        setTimeout('document.getElementById("timer_inp").innerHTML = "<b>прямо сейчас</b>"', 2000);
        setTimeout('document.location.href="[[~81]]"', 2000);
    </script>
</div>`:else=``]]
<form class="well" action="[[~[[*id]]]]" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="enable_html[]" value="about_me">
    <input type="hidden" name="allowed_tags" value="<p><i><a><br><div>">
    <div class="row-fluid">
        [[+message]]
        <div class="form-group">
            <label class="control-label" for="fullname">Имя, фамилия</label>
            <input type="text" class="form-control" name="fullname" id="fullname" value="[[+fullname]]" placeholder="Введите ваше имя и фамилию" required>
        </div>
        <div class="form-group">
            <label class="control-label" for="email">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Введите адрес электронной почты" value="[[+email]]" required>
            <input type="hidden" name="username" value="[[+email]]">
        </div>
        <div class="form-group">
            <label class="control-label" for="YandexMoney">Номер кошелька Яндекс.Деньги</label>
            <input type="text" class="form-control" name="YandexMoney" id="YandexMoney" value="[[+YandexMoney]]">
        </div>
        <div class="form-group">
            <label class="control-label" for="phone">Телефон</label>
            <input type="text" class="form-control" name="phone" id="phone" value="[[+phone]]">
        </div>
        <div class="form-group">
            <label class="control-label" for="website">Сайт</label>
            <input type="text" class="form-control" name="website" id="website" value="[[+website]]">
        </div>
        <div class="form-group">
            <label class="control-label" for="country">Страна</label>
            <input type="text" class="form-control" name="country" id="country" value="[[+country:default=`Россия`]]">
        </div>
        <div class="form-group">
            <label class="control-label" for="city">Город</label>
            <input type="text" class="form-control" name="city" id="city" value="[[+city]]">
        </div>
        <div class="form-group">
            <label class="control-label" for="about_me">Информация обо мне</label>
		<span class="help-block">Вы можете использовать основные теги языка HTML при размещении информации о себе
		</span>
            <textarea class="form-control" name="about_me" id="about_me" rows="14">[[+about_me]]</textarea>
        </div>


        <div class="form-group">
            <label class="control-label" for="invitation_template">Шаблон письма-приглашения на мероприятия</label>
		<span class="help-block">В нижеследующих шаблонах допустимо использовать произвольный текст, а также специальные элементы:
			<ul>
                <li><b>%br%</b> - символ перехода на новую строку</li>
                <li><b>%firstname%</b> - имя вашего контакта</li>
                <li><b>%name_meeting%</b> - название вашего мероприятия</li>
                <li><b>%date_meeting%</b> - время начала мероприятия</li>
                <li><b>%duration%</b> - продолжительность мероприятия (в минутах)</li>
                <li><b>%page_meeting%</b> - ссылка на страницу с описанием мероприятия</li>
                <li><b>%link_meeting%</b> - персональная ссылка для входа на мероприятие</li>
                <li><b>%fullname_creator%</b> - имя и фамилия ведущего мероприятия</li>
                <li><b>%email_creator%</b> - email ведущего мероприятия</li>
            </ul>
			Подставляя эти элементы в шаблон письма, окончательное содержимое будет формироваться автоматически при отправке.
		</span>
            <textarea class="form-control" name="invitation_template" id="invitation_template" rows="14">[[+invitation_template]]</textarea>
        </div>
        <div class="form-group">
            <label class="control-label" for="message_template">Шаблон письма-рассылки</label>
            <textarea class="form-control" name="message_template" id="message_template" rows="14">[[+message_template]]</textarea>
        </div>
        <div class="form-group">
            <label class="control-label" for="city">Новая фотография</label>
            <input type="file" class="form-control" name="photo" id="photo"/>
        </div>


        <div class="form-group">
            <input type="submit" value="Сохранить мои настройки" class="btn btn-primary center-block" />
        </div>
    </div>
</form>