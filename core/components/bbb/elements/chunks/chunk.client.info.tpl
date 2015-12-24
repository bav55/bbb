<h3>[[+firstname]]&nbsp;[[+lastname]]</h3>
<div class="row">
    <div class="col-xs-12 col-md-12">
            <div class="col-xs-12 col-md-2">
                <img class="img-responsive  thumbnail center-block" src="[[+photo]]" alt="">
                <a href="#EditClientModal" class="form-control btn btn-primary"  data-toggle="modal" data-target="#EditClientModal">Редактировать</a>
                <p></p>
                <form id="deleteClientForm" method="post" action="">
                        <input type="hidden" name="id_client" value="[[+id_client]]">
                        <input style="display:none;" type="text" name="email_" value="" />
                        <input type="submit " class="form-control btn btn-danger" name="deleteClient-submit" onClick="if(confirm('Вы действительно хотите удалить контакт: [[+firstname]] [[+lastname]]? Также будут удалены все действия, связанные с этим контактом.')){document.getElementById('deleteClientForm').submit(); }" value="Удалить контакт">
                </form>
                [[!FormIt?
                    &hooks=`spam,deleteClient,redirect`
                    &submitVar=`deleteClient-submit`
                    &redirectTo=`[[++bbb_my_contacts_id]]`
                ]]
                <p></p>
            </div>
            <div class="col-xs-12 col-md-10">
                <div class="col-xs-12">
                    <div class="col-xs-4">
                        <p>Дата рождения:</p>
                    </div>
                    <div class="col-xs-8 ">
                         <p><b>[[+birthdate:is=`0000-00-00 00:00:00`:then=``:else=`[[+birthdate:strtotime:date=`%d.%m.%Y`]]`]]</b></p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4">
                        <p>Email:</p>
                    </div>
                    <div class="col-xs-8">
                        <p><b>[[+email]]</b></p>
                    </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4">
                        <p>Телефон:</p>
                    </div>
                    <div class="col-xs-8">
                        <p><b>[[+phone]]</b></p>
                    </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4">
                        <p>Мобильный:</p>
                    </div>
                    <div class="col-xs-8">
                        <p><b>[[+mobilephone]]</b></p>
                    </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4">
                        <p>Пол:</p>
                    </div>
                    <div class="col-xs-8">
                        <p><b>[[+gender:is=`0`:then=`Мужской`:else=`Женский`]]</b></p>
                    </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4">
                        <p>Адрес:</p>
                    </div>
                    <div class="col-xs-8">
                        <p><b>[[+address]]</b></p>
                    </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4">
                        <p>Комментарий:</p>
                    </div>
                    <div class="col-xs-8">
                        <p><b>[[+comment]]</b></p>
                    </div>
                </div>
            </div>
    </div>
   <div class="clearfix"></div>
</div>
[[!$form.edit.client.modal.tpl?id_client=[[+id_client]]]]

[[!FormIt?
&hooks=`spam,editClient,redirect`
&submitVar=`editClient-submit`
&redirectTo=`[[*id]]`
&redirectParams=`{"id_client":"[[+id_client]]"}`
]]