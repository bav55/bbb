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
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <caption>
                        <h4>Действия по данному контакту</h4>
                    </caption>

                    <thead>
                    <th class="col-xs-3 col-sm-3">Дата и время действия</th>
                    <th class="col-xs-5 col-sm-5">Мероприятие</th>
                    <th class="col-xs-4 col-sm-4">Действие</th>
                    </thead>
                    <tbody>
                    [[!pdoResources?
                    &loadModels=`bbb`
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
                    &showLog=`1`
                    ]]
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        [[*Content]]
    </div>
    [[$Footer]]
</div>
</body>
</html>
