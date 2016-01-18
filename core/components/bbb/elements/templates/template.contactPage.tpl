<!DOCTYPE html>
<html>
<head>
    [[$Head]]
</head>
<body>
[[$Navbar]]
<div class="container">
    [[$Crumbs]]
    <div id="content" class="inner">
        [[!pdoResources?
            &tpl=`client.info.tpl`
            &loadModels=`bbb`
            &class=`Clients`
            &sortby=``
            &where=`["id_client = [[!getUrlParam?&name=`id_client` &int=`1`]] AND id_creator = [[+modx.user.id]]"]`
            &showLog=`1`
        ]]

            <div class="row">
            <hr/>
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="row text-center">
                    <br>
                    <h4>Действия по данному контакту</h4>
                </div>
                [[!pdoPage?
                &element=`pdoResources`
                &pageLimit=`7`
                &tpl=`actions.contact.item.tpl`
                &class=`Actions`
                &leftJoin=`{
                "Client":{
                "class": "Clients",
                "on": "Actions.id_client = Client.id_client"
                },
                "Meeting":{
                "class": "Meetings",
                "on": "Actions.id_meeting = Meeting.id_meeting"
                },
                "Actiontype":{
                "class": "ActionTypes",
                "on": "Actions.id_actiontype = Actiontype.id"
                }
                }`
                &select=`{
                "Actions": "*",
                "Client": "firstname,lastname,email,id_creator",
                "Meeting":"id_meeting,name_meeting,date_meeting",
                "Actiontype":"id,name"
                }`
                &where=`["Actions.id_client = [[!getUrlParam?&name=`id_client` &int=`1`]] AND Client.id_creator = [[+modx.user.id]]"]`
                &sortby=`timestamp_action`
                &sortdir=`DESC`
                &showLog=`0`
                &limit=`10`
                &ajaxMode=`button`
                &ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">Загрузить еще</button></p>`
                &ajaxElemWrapper=`#pdopage`
                &ajaxElemRows=`#pdopage .rows`
                &ajaxElemPagination=`#pdopage .pagination`
                &ajaxElemLink=`#pdopage .pagination a`
                &ajaxElemMore=`#pdopage .btn-more`
                &toPlaceholder=`actions`
                &pageNavVar=`page.nav`
                &pageVarKey=`page`
                &totalVar=`page.total`
                ]]
                [[+actions:is=``:then=`<p class="alert alert-info">Действий не найдено</p>`:else=`
                <div class="row">
                    <div class="col-sm-3 text-center hidden-xs"><h5>Дата и время действия</h5></div>
                    <div class="col-sm-4 text-center hidden-xs"><h5>Мероприятие</h5></div>
                    <div class="col-sm-5 text-center hidden-xs"><h5>Действие</h5></div>
                </div>`]]
                <div id="pdopage">
                    <div class="rows">
                        [[+actions]]
                    </div>
                    [[+page.nav]]
                </div>

            </div>
            </div>
        </div>

        [[*Content]]
    </div>
    [[$Footer]]
</div>
</body>
</html>
