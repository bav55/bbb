<form class="form-horizontal" id="NewClientForm" method="post" action="" enctype="multipart/form-data">
    <input style="display:none;" type="text" name="email_" value="" />
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
        <label for="phone" class="col-xs-5 control-label"><span>Телефон:</span></label>
        <div class="col-xs-7">
            <input type="text"  class="form-control" id="phone" name="phone"  value="[[+phone]]" placeholder="">
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="mobilephone" class="col-xs-5 control-label"><span>Мобильный телефон:</span></label>
        <div class="col-xs-7">
            <input type="text"  class="form-control" id="mobilephone" name="mobilephone"  value="[[+mobilephone]]" placeholder="">
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="birthdate" class="col-xs-5 control-label"><span>Дата рождения:</span></label>
        <div class="col-xs-7">
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="[[+birthdate]]" >
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="gender" class="col-xs-5 control-label"><span>Пол:</span></label>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input type="radio" name="gender" value="0"> Мужской
            </label>
        </div>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input type="radio" name="gender" value="1"> Женский
            </label>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="address" class="col-xs-5 control-label"><span>Адрес:</span></label>
        <div class="col-xs-7">
            <textarea rows="2" class="form-control" id="address" name="address" placeholder="Введите адрес"></textarea>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="comment" class="col-xs-5 control-label"><span>Ваш комментарий:</span></label>
        <div class="col-xs-7">
            <textarea rows="2" class="form-control" id="comment" name="comment" placeholder="Введите ваш комментарий"></textarea>
        </div>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label for="photo" class="col-xs-5 control-label"><span>Фото:</span></label>
        <div class="col-xs-7">
            <input type="file" class="form-control" name="photo" id="photo"/>
        </div>
    </div>
    <!--
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <label for="website" class="col-xs-5 control-label"><span>Веб-сайт:</span></label>
 <div class="col-xs-7">
     <input type="text" class="form-control" id="website" name="website" value="[[+website]]" placeholder="" />
 </div>
</div>

     <div class="form-group col-xs-12 col-sm-12 col-md-12">
         <div class="col-xs-offset-2 col-xs-8 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 ">
                 <input  type="submit" class="form-control button btn-primary" name="submit" value="Создать новый контакт"/>
         </div>
     </div>
-->
</form>