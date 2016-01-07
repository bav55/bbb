[[!setPlaceholdersFromRequest]]
<div class="well">
    <h4>Поиск контактов</h4>
    <form class="form-horizontal" action="" method="post">
        <div class="input-group">
            <input type="search" class="form-control" name="search_contact" value="[[+search_contact]]" placeholder="Все контакты">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="find_client"><i class="fa fa-search"></i></button>
                        </span>
        </div>
        <!-- /.input-group -->
    </form>
</div>
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
&where=`["id_creator = [[!+modx.user.id]]  [[+search_contact:ne=``:then=` and (firstname like '%[[+search_contact]]%' OR lastname like '%[[+search_contact]]%')`]]"]`
&limit=`9`
&pageLimit=`7`
&return=`tpl`
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
&submitVar=`newClient-submit`
&emailTo=`bav55@yandex.ru`
&emailSubject=`Добавлен новый контакт`
&emailTpl=`tpl.bbb.item`
&redirectTo=`[[*id]]`
]]