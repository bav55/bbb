<form class="form-horizontal" id="NewRequestForm" method="post" action="">
    <legend>Подать заявку на участие</legend>
    <input style="display:none;" type="text" name="email_" value="" />
    <input type="hidden" name="id_meeting" value="[[+id_meeting]]">
    <input type="hidden" name="id_creator" value="[[+id_creator]]">
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="firstname"  class="col-xs-5 control-label"><span>Имя Отчество:</span></label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="firstname" name="firstname" value="[[+firstname]]" placeholder="" required>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="lastname" class="col-xs-5 control-label"><span>Фамилия:</span></label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="lastname" name="lastname" value="[[+lastname]]" required>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="email" class="col-xs-5 control-label"><span>E-mail:</span></label>
        <div class="col-xs-7">
            <input type="email" class="form-control" id="email" name="email"  value="[[+email]]"  required>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="mobilephone" class="col-xs-5 control-label"><span>Мобильный телефон:</span></label>
        <div class="col-xs-7">
            <input type="text"  class="form-control" id="mobilephone" name="mobilephone"  value="[[+mobilephone]]" placeholder="">
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10 ">
            <input  type="submit" class="form-control button btn-primary btn-md" name="receivedRequest-submit" value="Отправить заявку"/>
        </div>
    </div>
</form>