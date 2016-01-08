[[!Profile]]

<form class="form-horizontal well">
    <div class="row-fluid">
        <div class="col-xs-12 col-sm-3 center-block">
            <img class="img-responsive  thumbnail center-block" src="[[+photo:phpthumbof=`w=300&h=300`]]">

            <p class="form-control-static">
                <a class="btn btn-primary" style="width: 100%;" href="[[~65]]" >Редактировать мои настройки</a>
            </p>
        </div>
        <div class="col-xs-12 col-sm-9">
            <div class="form-group">
                <label class="control-label col-xs-3" for="fullname">Имя, фамилия:</label>
                <p class="form-control-static col-xs-9">[[+fullname]]</p>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" for="email">E-mail:</label>
                <p class="form-control-static col-xs-9">[[+username]]</p>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" for="password">Пароль:</label>
                <p class="form-control-static col-xs-9"><a href="[[~66]]">Изменить пароль</a></p>
            </div>
            [[+YandexMoney:notempty=`
            <div class="form-group">
                <label class="control-label col-xs-3" for="YandexMoney">Кошелек Яндекс.Деньги:</label>
                <p class="form-control-static col-xs-9">[[+YandexMoney]]</p>
            </div>`]]
            [[+phone:notempty=`
            <div class="form-group">
                <label class="control-label col-xs-3" for="phone">Телефон:</label>
                <p class="form-control-static col-xs-9">[[+phone]]</p>
            </div>`]]
            [[+website:notempty=`
            <div class="form-group">
                <label class="control-label col-xs-3" for="website">Ваш сайт:</label>
                <p class="form-control-static col-xs-9"><a href="http://[[+website]]">[[+website]]</a></p>
            </div>`]]
            [[+country:notempty=`
            <div class="form-group">
                <label class="control-label col-xs-3" for="country">Ваша страна:</label>
                <p class="form-control-static col-xs-9">[[+country]]</p>
            </div>`]]
            [[+city:notempty=`
            <div class="form-group">
                <label class="control-label col-xs-3" for="city">Ваш город:</label>
                <p class="form-control-static col-xs-9">[[+city]]</p>
            </div>`]]
        </div>
    </div>
    <div class="row-fluid form-group">
        <div class="col-xs-12">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tab-zero" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;Информация обо мне</a>
                </li>
                <li class=""><a href="#tab-one" data-toggle="tab"><i class="fa fa-bullhorn"></i>&nbsp;Шаблон приглашения на мероприятие</a>
                </li>
                <li class=""><a href="#tab-two" data-toggle="tab"><i class="fa fa-paper-plane"></i>&nbsp;Шаблон для рассылки</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab-zero">
                    <h4>Справочная информация обо мне</h4>
                    <textarea readonly disabled class="form-control-static col-xs-12" rows="14">[[+about_me]]</textarea>
                </div>
                <div class="tab-pane fade" id="tab-one">
                    <h4>Шаблон сообщения - приглашения на мероприятие</h4>
                    <textarea readonly disabled  class="form-control-static col-xs-12" rows="14">[[+invitation_template]]</textarea>
                </div>
                <div class="tab-pane fade" id="tab-two">
                    <h4>Шаблон сообщения - рассылки по контактам</h4>
                    <textarea readonly disabled class="form-control-static col-xs-12" rows="14">[[+message_template]]</textarea>
                </div>
            </div>

        </div>
</form>
