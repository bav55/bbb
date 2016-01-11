<h3>[[+name_meeting]]</h3>
<div class="row">
    <aside class="col-xs-12 col-sm-3 col-lg-3">
        <a href="#">
            <!--  <img src="holder.js/250x250" class="img-responsive thumbnail" alt=""> -->
            <img src="[[+tv.image_meeting]]" class="img-responsive thumbnail center-block" alt="">
        </a>
        <div class="caption text-center">
            <h5>Ведущий: <b>[[+fullname]]</b></h5>
            <p>Дата и время мероприятия: </p>
            <p><b>[[+date_meeting:strtotime:date=`%d.%m.%Y, %H:%M`]]<br/> <small>(время Московское)</small></b></p>
            [[+cost:ne=`0`:then=`<p>Стоимость участия: <b>[[+cost]] руб.</b></p>`:else=``]]
            [[!+modx.user.id:is=`[[+id_creator]]`:then=`
            <p>
                <a href="#EditMeetingModal"  class="form-control btn btn-primary" data-toggle="modal" data-target="#EditMeetingModal">Обновить описание мероприятия</i></a>
            </p>
            <p>
                <a href="[[~[[++bbb_sentInvitation_page_id]]]]?&id_meeting=[[+id_meeting]]&redirect=[[+id_resource]]" class="form-control btn btn-success">Отправить приглашения</a>
            </p>
            <form name="startMeeting" method="post" action="[[~[[*id]]]]">
                <input type="hidden" name="id_meeting" value="[[+id_meeting]]">
                <input type="hidden" name="id_creator" value="[[+id_creator]]">
                <input style="display:none;" type="text" name="email_" value="" />
                <input type="submit" name="startMeeting-submit" class="form-control btn btn-large btn-danger " value="Начать мероприятие">
            </form>
            [[!FormIt?
            &hooks=`spam,startMeeting`
            &submitVar=`startMeeting-submit`
            ]]
            `:else=``]]
        </div>
    </aside>
    <article class="col-xs-12 col-sm-5 col-lg-5">
        [[*content]]
    </article>
    <aside class="col-xs-12 col-sm-4 col-lg-4">
        [[$tpl.form.request?]]
        [[!FormIt?
        &hooks=`spam,email,receivedRequest`
        &validate=`firstname:required,lastname:required,email:email:required`
        &emailTo=`[[+email_creator]]`
        &emailSubject=`Поступила новая заявка на участие  вашем мероприятии`
        &emailTpl=`tpl.request.email`
        &submitVar=`receivedRequest-submit`
        &successMessage=`<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>Ваша заявка успешно отправлена!</p>
        </div>`
        ]]
    </aside>
</div>
[[!+modx.user.id:is=`[[+id_creator]]`:then=`
<div class="row">
    <hr/>
    <div class="col-xs-12 col-sm-12 col-lg-12">
        <h4>Действия по данному мероприятию</h4>
        <div class="col-xs-12 well">

            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#tab-one" data-toggle="tab"><i class="fa fa-bullhorn"></i>  Заявки и приглашения</a>
                </li>
                <li class=""><a href="#tab-two" data-toggle="tab"><i class="fa fa-microphone"></i>  Участие в мероприятии</a>
                </li>
                <li class=""><a href="#tab-three" data-toggle="tab"><i class="fa fa-check-circle"></i>  Отзывы участников</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab-one">
                    <div class="row text-center">
                            <br>
                            <h4>Полученные заявки и отправленные приглашения</h4>
                    </div>

                        [[!pdoPage?
                        &element=`pdoResources`
                        &pageLimit=`7`
                        &tpl=`actions.item.tpl`
                        &loadModels=`bbb`
                        &class=`Actions`
                        &leftJoin=`{
                        "Client":{
                        "class": "Clients",
                        "on": "Actions.id_client = Client.id_client"
                        },
                        "Actiontype":{
                        "class": "ActionTypes",
                        "on": "Actions.id_actiontype = Actiontype.id"
                        }
                        }`
                        &select=`{
                        "Actions": "*","Client": "firstname,lastname,email","Actiontype":"id,name"
                        }`
                        &where=`["id_meeting = [[+id_meeting]] and (Actiontype.name = 'RECEIVED_REQUEST' or Actiontype.name = 'SENT_INVITATION')"]`
                        &sortby=`lastname, timestamp_action`
                        &sortdir=`DESC`
                        &showLog=`0`
                        &limit=`10`
                        &ajaxMode=`button`
                        &ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">[[%pdopage_more]]</button></p>`
                        &ajaxElemWrapper=`#pdopage1`
                        &ajaxElemRows=`#pdopage1 .rows`
                        &ajaxElemPagination=`#pdopage1 .pagination`
                        &ajaxElemLink=`#pdopage1 .pagination a`
                        &ajaxElemMore=`#pdopage1 .btn-more`
                        &toPlaceholder=`actions1`
                        &pageNavVar=`page1.nav`
                        &pageVarKey=`page1`
                        &totalVar=`page1.total`
                        ]]
                    [[+actions1:is=``:then=`<p class="alert alert-info">Действий не найдено</p>`:else=`
                    <div class="row">
                        <div class="col-sm-3 text-center hidden-xs"><h5>Дата и время действия</h5></div>
                        <div class="col-sm-4 text-center hidden-xs"><h5>Контакт</h5></div>
                        <div class="col-sm-5 text-center hidden-xs"><h5>Действие</h5></div>
                    </div>`]]
                    <div id="pdopage1">
                        <div class="rows">
                    [[+actions1]]
                        </div>
                        [[+page1.nav]]
                    </div>

                </div>

                <div class="tab-pane fade" id="tab-two">
                    <div class="row text-center">
                        <br>
                        <h4>Участие в мероприятии</h4>
                    </div>

                    [[!pdoPage?
                    &element=`pdoResources`
                    &pageLimit=`7`
                    &tpl=`actions.item.tpl`
                    &loadModels=`bbb`
                    &class=`Actions`
                    &leftJoin=`{
                    "Client":{
                    "class": "Clients",
                    "on": "Actions.id_client = Client.id_client"
                    },
                    "Actiontype":{
                    "class": "ActionTypes",
                    "on": "Actions.id_actiontype = Actiontype.id"
                    }
                    }`
                    &select=`{
                    "Actions": "*","Client": "firstname,lastname,email","Actiontype":"id,name"
                    }`
                    &where=`["id_meeting = [[+id_meeting]] and Actiontype.name in ('MEETING_IS_CREATED','MEETING_STARTED','USER_INVOLVED_MEETING','USER_LEFT_MEETING','MEETING_ENDED')"]`
                    &sortby=`lastname, timestamp_action`
                    &sortdir=`DESC`
                    &showLog=`0`
                    &limit=`10`
                    &ajaxMode=`button`
                    &ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">[[%pdopage_more]]</button></p>`
                    &ajaxElemWrapper=`#pdopage2`
                    &ajaxElemRows=`#pdopage2 .rows`
                    &ajaxElemPagination=`#pdopage2 .pagination`
                    &ajaxElemLink=`#pdopage2 .pagination a`
                    &ajaxElemMore=`#pdopage2 .btn-more`
                    &toPlaceholder=`actions2`
                    &pageNavVar=`page2.nav`
                    &pageNavVar=`page2.nav`
                    &pageVarKey=`page2`
                    &totalVar=`page2.total`
                    ]]
                    [[+actions2:is=``:then=`<p class="alert alert-info">Действий не найдено</p>`:else=`
                    <div class="row">
                        <div class="col-sm-3 text-center hidden-xs"><h5>Дата и время действия</h5></div>
                        <div class="col-sm-4 text-center hidden-xs"><h5>Контакт</h5></div>
                        <div class="col-sm-5 text-center hidden-xs"><h5>Действие</h5></div>
                    </div>`]]
                    <div id="pdopage2">
                        <div class="rows">
                            [[+actions2]]
                        </div>
                        [[+page2.nav]]
                    </div>

                </div>
                <div class="tab-pane fade" id="tab-three">
                    <div class="row text-center">
                        <br>
                        <h4>Отзывы участников</h4>
                    </div>

                    [[!pdoPage?
                    &element=`pdoResources`
                    &pageLimit=`7`
                    &tpl=`actions.item.tpl`
                    &loadModels=`bbb`
                    &class=`Actions`
                    &leftJoin=`{
                    "Client":{
                    "class": "Clients",
                    "on": "Actions.id_client = Client.id_client"
                    },
                    "Actiontype":{
                    "class": "ActionTypes",
                    "on": "Actions.id_actiontype = Actiontype.id"
                    }
                    }`
                    &select=`{
                    "Actions": "*","Client": "firstname,lastname,email","Actiontype":"id,name"
                    }`
                    &where=`["id_meeting = [[+id_meeting]] and Actiontype.name = 'USER_SENT_REVIEW'"]`
                    &sortby=`lastname, timestamp_action`
                    &sortdir=`DESC`
                    &showLog=`0`
                    &limit=`10`
                    &ajaxMode=`button`
                    &ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">[[%pdopage_more]]</button></p>`
                    &ajaxElemWrapper=`#pdopage3`
                    &ajaxElemRows=`#pdopage3 .rows`
                    &ajaxElemPagination=`#pdopage3 .pagination`
                    &ajaxElemLink=`#pdopage3 .pagination a`
                    &ajaxElemMore=`#pdopage3 .btn-more`
                    &toPlaceholder=`actions3`
                    &pageNavVar=`page3.nav`
                    &pageNavVar=`page3.nav`
                    &pageVarKey=`page3`
                    &totalVar=`page3.total`
                    ]]
                    [[+actions3:is=``:then=`<p class="alert alert-info">Действий не найдено</p>`:else=`
                    <div class="row">
                        <div class="col-sm-3 text-center hidden-xs"><h5>Дата и время действия</h5></div>
                        <div class="col-sm-4 text-center hidden-xs"><h5>Контакт</h5></div>
                        <div class="col-sm-5 text-center hidden-xs"><h5>Отзывы</h5></div>
                    </div>`]]
                    <div id="pdopage3">
                        <div class="rows">
                            [[+actions3]]
                        </div>
                        [[+page3.nav]]
                    </div>

                </div>
            </div>

    </div>
</div>
</div>
[[!FormIt?
&hooks=`sentInvitation`
&submitVar=`actions_meeting-submit`
]]
<div class="row" style="background-color: #FFFFCC; height: 430px; margin-top: 20px;">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        [[!$tpl.meeting.edit.content?]]

        [[!FormIt?
        &hooks=`spam,editContentMeeting,redirect`
        &submitVar=`editContent-submit`
        &id_resource=`[[+id_resource]]`
        &redirectTo=`[[*id]]`
        ]]
    </div>
</div>
[[!$tpl.form.edit.meeting.modal?id_meeting=[[+id_meeting]]]]
[[!FormIt?
&hooks=`spam,editMeeting,redirect`
&validate=`name_meeting:required,date_meeting:required,duration:required,maxParticipants:required`
&submitVar=`editMeeting-submit`
&redirectTo=`[[*id]]`
]]

`:else=``]]
