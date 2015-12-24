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
        <h3>[[*pagetitle]]</h3>
            [[!pdoResources?
                &loadModels=`bbb`
                &class=`Clients`
                &leftJoin=`{
                      "Actions":{
                            "class": "Actions",
                            "on": "Actions.id_client = Clients.id_client"
                      },
                      "ActionTypes":{
                            "class": "ActionTypes",
                            "on": "Actions.id_actiontype = ActionTypes.id"
                      },
                      "Meetings":{
                            "class": "Meetings",
                            "on": "Meetings.id_meeting = Actions.id_meeting"
                      },
                      "Creator":{
                                "class": "modUser",
                                "on": "Meetings.id_creator = Creator.id"
                      },
                      "Profile":{
                              "class": "modUserProfile",
                                "on": "Creator.id = Profile.internalKey"
                      }
                }`
                &select=`{
                    "Meetings": "id_meeting,name_meeting,cost",
                    "Clients": "id_client,firstname,lastname,email",
                    "Actions": "*",
                    "ActionTypes": "id,name",
                    "Profile": "Profile.email as email_creator, Profile.extended"
                }`
                &where=`["ActionTypes.name='RECEIVED_REQUEST' and Clients.id_client = [[!getUrlParam?&name=`id_client` &int=`1`]] and Meetings.id_meeting = [[!getUrlParam?&name=`id_meeting` &int=`1`]]"]`
                &sortby=`id_client`
                &showLog=`0`
                &limit=`1`
                &tpl=`page.payment.tpl`
            ]]
    </div>
    [[$Footer]]
</div>
</body>
</html>
