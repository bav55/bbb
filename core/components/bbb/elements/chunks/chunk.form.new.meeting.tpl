<form class="form-horizontal" id="NewMeetingForm" method="post" action="">
    <input style="display:none;" type="text" name="email_" value="" />
    <input type="hidden" name="id_meeting" value="[[+id_meeting]]">
    <input type="hidden" name="moderatorPw"  value="qwerty"  required/>
    <input type="hidden" name="attendeePw"  value="asdfgh"  required/>
    <div class="form-group col-xs-12 col-sm 12">
        <label for="name_meeting" class="col-xs-3 col-sm-3 control-label"><span>Название встречи:<span class="text-danger"> *</span></span></label>
        <div class="col-xs-9 col-sm-9">
            <input type="text" class="form-control" id="name_meeting" name="name_meeting" value="[[+name_meeting:htmlent]]" placeholder="Укажите название мероприятия" required>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="date_meeting" class="col-xs-5 control-label"><span>Дата и время начала:<span class="text-danger"> *</span></span></label>
        <div class="col-xs-7">
            <input type="datetime-local" class="form-control" id="date_meeting" name="date_meeting" value="[[+date_meeting:strtotime:date=`%Y-%m-%dT%H:%M`]]" required>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="duration" class="col-xs-5 control-label"><span>Продолжительность:<span class="text-danger"> *</span></span></label>
        <div class="col-xs-7">
            <input type="number" min="0" max="180" step="10" class="form-control" id="duration" name="duration"  value="[[+duration]]"  placeholder="в минутах" required>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="maxParticipants" class="col-xs-5 control-label"><span>Количество участников:<span class="text-danger"> *</span></span></label>
        <div class="col-xs-7">
            <input type="number" min="0" max="100" step="10" class="form-control" id="maxParticipants" name="maxParticipants"  value="[[+maxParticipants]]" placeholder="" required>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="logoutUrl" class="col-xs-5 control-label"><span>По окончании открыть:</span></label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="logoutUrl" name="logoutUrl"  value="[[+logoutUrl]]" placeholder="http://web-meeting.ru" />
        </div>
    </div>
    <!--
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="moderatorPw" class="col-xs-5 control-label"><span>Пароль ведущего:</span></label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="moderatorPw" name="moderatorPw"  value="[[+moderatorPw]]"  placeholder=""  required/>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="attendeePw" class="col-xs-5 control-label"><span>Пароль участника:</span></label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="attendeePw" name="attendeePw"  value="[[+attendeePw]]" placeholder=""  required/>
        </div>
    </div>
    -->
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="welcomeMsg" class="col-xs-5 control-label"><span>Приветствие в чате:</span></label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="welcomeMsg" name="welcomeMsg" value="[[+welcomeMsg]]" placeholder="" />
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="duration" class="col-xs-5 control-label"><span>Стоимость участия:</span></label>
        <div class="col-xs-7">
            <input  type="number" min="0" id="cost" class="form-control" name="cost" value="[[+cost]]" placeholder="в российских рублях">
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-offset-5 col-xs-7">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="record" name="record" value="1" [[+record:is=`1`:then=`checked`]]/>
                    <span>Записывать мероприятие</span>
                </label>
            </div>
        </div>
    </div>


        <!--
            <div class="form-group col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-offset-2 col-xs-8 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 ">
                        <input  type="submit" class="form-control button btn-primary" name="submit" value="Создать мероприятие"/>
                </div>
            </div>
    -->
</form>