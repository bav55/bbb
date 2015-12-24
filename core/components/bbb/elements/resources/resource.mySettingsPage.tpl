[[!Profile]]
<a href="[[~65]]" >Редактировать</a>
<div class="form-horizontal well">
    <div class="row-fluid">
        <div class="span8 offset2">
            <div class="clearfix">
                <label style="width: 170px;" class="control-label" for="fullname">Имя, фамилия</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px; font-weight: bold;">[[+fullname]]</p>
                </div>
            </div>
            <div class="clearfix">
                <label style="width: 170px;" class="control-label" for="email">Email</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+email]]</p>
                </div>
            </div>
            <div class="clearfix">
                <label style="width: 170px;" class="control-label" for="password">Пароль</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;"><a href="[[~66]]">Изменить пароль</a></p>
                </div>
            </div>
            [[+phone:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="phone">Телефон</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+phone]]</p>
                </div>
            </div>`]]
            [[+mobilephone:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="mobilephone">Мобильный телефон</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+mobilephone]]</p>
                </div>
            </div>`]]
            [[+country:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="country">Страна</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+country:default=`Россия`]]</p>
                </div>
            </div>`]]
            [[+city:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="city">Город</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+city]]</p>
                </div>
            </div>`]]
            [[+address:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="address">Адрес</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+address]]</p>
                </div>
            </div>`]]
            [[+website:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="website">Сайт</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+website:notempty=`<a href="http://[[+website]]">[[+website]]</a>`]]</p>
                </div>
            </div>`]]
            [[+invitation_template:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="invitation_template">Шаблон приглашения:</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+invitation_template:notempty=`[[+invitation_template]]`]]</p>
                </div>
            </div>`]]
            [[+message_template:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="message_template">Шаблон для рассылки:</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+message_template:notempty=`[[+message_template]]`]]</p>
                </div>
            </div>`]]
            [[+YandexMoney:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="YandexMoney">Кошелек Яндекс.Денег:</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">[[+YandexMoney:notempty=`[[+YandexMoney]]`]]</p>
                </div>
            </div>`]]
            [[+photo:notempty=`<div class="clearfix">
                <label style="width: 170px;" class="control-label" for="photo">Фотография:</label>
                <div class="input" style="margin-left: 180px;">
                    <p style="margin-top: 6px;">
                        <img class="img-responsive  thumbnail center-block" src="[[+photo:notempty=`[[+photo]]`]]" align="left" alt="">
                    </p>
                </div>
            </div>`]]
        </div>
    </div>
</div>