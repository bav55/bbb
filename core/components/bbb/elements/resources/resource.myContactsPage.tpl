<hr/>
[[!pdoPage?
&snippet=`pdoResources`
&tpl=`clients.item.tpl`
&showLog=`0`
&sortby=`lastname, firstname`
&sortdir=`ASC`
&loadModels=`bbb`
&class=`Clients`
&where=`["id_creator = [[+modx.user.id]]"]`
&limit=`10`
&pageLimit=`7`
]]
[[+page.nav]]
<hr/>
<a href="#NewClientModal" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#NewClientModal">
    Добавить новый контакт
</a>

[[!$tpl.form.new.client.modal]]


[[!FormIt?
&hooks=`spam,createClient,email,redirect`
&emailTo=`bav55@yandex.ru`
&emailSubject=`Добавлен новый контакт`
&emailTpl=`tpl.bbb.item`
&redirectTo=`[[*id]]`
]]