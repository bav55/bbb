<hr/>
<div class="container">
<div class="row">
[[!pdoPage?
&snippet=`pdoResources`
&tpl=`clients.item.tpl`
&showLog=`0`
&sortby=`lastname, firstname`
&sortdir=`ASC`
&loadModels=`bbb`
&class=`Clients`
&where=`["id_creator = [[+modx.user.id]]"]`
&limit=`9`
&pageLimit=`7`
]]

<hr/>
</div>
    <div class="row center-block>">
        [[+page.nav]]
    </div>
    <div class="row center-block>">
        <a href="#NewClientModal" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#NewClientModal">
            Добавить новый контакт
        </a>
    </div>
</div>
<div class="clearfix"></div>


[[!$tpl.form.new.client.modal]]


[[!FormIt?
&hooks=`spam,createClient,email,redirect`
&emailTo=`bav55@yandex.ru`
&emailSubject=`Добавлен новый контакт`
&emailTpl=`tpl.bbb.item`
&redirectTo=`[[*id]]`
]]