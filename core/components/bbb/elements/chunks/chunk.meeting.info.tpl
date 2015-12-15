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
            [[!+modx.user.id:is=`[[+id_creator]]`:then=`
            <p>
                <a href="#EditMeetingModal"  class="form-control btn btn-primary" data-toggle="modal" data-target="#EditMeetingModal">Обновить описание мероприятия</i></a>
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
        &hooks=`spam,receivedRequest,email`
        &emailTo=`bav55@yandex.ru`
        &emailSubject=`Поступила новая заявка на участие`
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
        <table class="table table-hover table-striped">
            <caption>
                <h4>Действия по данному мероприятию</h4>
            </caption>

            <thead>
                    <th class="col-xs-3">Дата и время действия</th>
                    <th class="col-xs-3">Контакт</th>
                    <th class="col-xs-5">Действие</th>
            </thead>
            <tbody>
            [[!pdoResources?
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
            &where=`["id_meeting = [[+id_meeting]]"]`
            &sortby=`timestamp_action`
            &sortdir=`DESC`
            &showLog=`1`
            ]]


            </tbody>
        </table>
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
            <a href="[[~[[++bbb_sentInvitation_page_id]]]]?&id_meeting=[[+id_meeting]]&redirect=[[+id_resource]]" class="form-control btn btn-primary">Отправить приглашение на это мероприятие</a>
         </div>
    </div>
</div>
[[!FormIt?
&hooks=`sentInvitation`
&submitVar=`actions_meeting-submit`
]]
<div class="row" style="background-color: #FFFFCC; height: 400px; margin-top: 20px;">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        [[!$tpl.meeting.edit.content?]]

        [[!FormIt?
        &hooks=`spam,editContentMeeting,redirect`
        &submitVar=`editContent-submit`
        &redirectTo=`[[*id]]`
        ]]
    </div>
</div>
 [[!$tpl.form.edit.meeting.modal?id_meeting=[[+id_meeting]]]]
[[!FormIt?
&hooks=`spam,editMeeting,redirect`
&submitVar=`editMeeting-submit`
&redirectTo=`[[*id]]`
]]

`:else=``]]
