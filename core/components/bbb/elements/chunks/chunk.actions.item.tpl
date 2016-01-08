<div style="padding: 10px;  border-bottom: 2px solid white;" class="row  img-hover [[+name:is=`RECEIVED_REQUEST`:then=`bg-success`:else=``]]
[[+name:is=`SENT_INVITATION`:then=`bg-warning`:else=``]]
[[+name:is=`USER_INVOLVED_MEETING`:then=`bg-info`:else=``]]
[[+name:is=`MEETING_STARTED`:then=`bg-success`:else=``]]
[[+name:is=`USER_SENT_REVIEW`:then=`bg-warning`:else=``]]
[[+name:is=`USER_LEFT_MEETING`:then=`bg-danger`:else=``]]">

    <div class="col-sm-3 text-center">
    [[+timestamp_action:strtotime:date=`%d.%m.%Y, %H:%M:%S`]]
    </div>
<div class="col-sm-4  text-center">
    [[+firstname]]&nbsp;[[+lastname]]([[+email]])
</div>
<div class="col-sm-5  text-center">

    [[+name:is=`RECEIVED_REQUEST`:then=`Пользователь подал заявку через сайт`:else=``]]
    [[+name:is=`SENT_INVITATION`:then=`<a href="[[getJoinMeetingUrl?id_client=`[[+id_client]]`&id_meeting=`[[+id_meeting]]`&user_type=`attendee`&id_waitpage=59]]">Приглашение отправлено пользователю.</a>`:else=``]]
    [[+name:is=`USER_INVOLVED_MEETING`:then=`Пользователь вошел на мероприятие.`:else=``]]
    [[+name:is=`MEETING_STARTED`:then=`Ведущий начал мероприятие.`:else=``]]
    [[+name:is=`USER_SENT_REVIEW`:then=`[[+extended.feedback]]`:else=``]]
    [[+name:is=`USER_LEFT_MEETING`:then=`Пользователь покинул мероприятие.`:else=``]]

</div>
</div>