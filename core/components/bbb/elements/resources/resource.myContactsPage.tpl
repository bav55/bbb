[[!setPlaceholdersFromRequest]]
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-4 col-lg-offset-4 text-center">
            <a href="#NewClientModal" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#NewClientModal">
                Добавить новый контакт
            </a>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
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
    &limit=`15`
    &pageLimit=`7`
    &return=`tpl`
    &ajaxMode=`button`
    &ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">Загрузить еще</button></p>`
    &ajaxElemWrapper=`#pdopage`
    &ajaxElemRows=`#pdopage .rows`
    &ajaxElemPagination=`#pdopage .pagination`
    &ajaxElemLink=`#pdopage .pagination a`
    &ajaxElemMore=`#pdopage .btn-more`
    &toPlaceholder=`my_clients`
    &pageNavVar=`page.nav`
    &pageVarKey=`page`
    &totalVar=`page.total`
]]
    [[+my_clients:is=``:then=`<div class="alert alert-info">Контактов не найдено</div>`:else=``]]
    <div id="pdopage">
        <div class="rows">
            [[+my_clients]]
        </div>
        [[+page.nav]]
    </div>

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