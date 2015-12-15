<tr [[+name:is=`RECEIVED_REQUEST`:then=`class="success"`:else=``]]
[[+name:is=`SENT_INVITATION`:then=`class="warning"`:else=``]]
[[+name:is=`USER_INVOLVED_MEETING`:then=`class="info"`:else=``]]
[[+name:is=`MEETING_STARTED`:then=`class="success"`:else=``]]
[[+name:is=`USER_SENT_REVIEW`:then=`class="warning"`:else=``]]
[[+name:is=`USER_LEFT_MEETING`:then=`class="danger"`:else=``]]
>
<td>
    [[+timestamp_action:strtotime:date=`%d.%m.%Y, %H:%M:%S`]]
</td>
<td>
    [[+firstname]]&nbsp;[[+lastname]]([[+email]])
</td>
<td>
    [[+name:is=`RECEIVED_REQUEST`:then=`<a href="[[getJoinMeetingUrl?id_client=`[[+id_client]]`&id_meeting=`[[+id_meeting]]`&user_type=`attendee`]]">Пользователь подал заявку через сайт</a>`:else=``]]
    [[+name:is=`SENT_INVITATION`:then=`Приглашение отправлено пользователю.`:else=``]]
    [[+name:is=`USER_INVOLVED_MEETING`:then=`Пользователь вошел на мероприятие.`:else=``]]
    [[+name:is=`MEETING_STARTED`:then=`Ведущий начал мероприятие.`:else=``]]
    [[+name:is=`USER_SENT_REVIEW`:then=`Пользователь оставил отзыв.`:else=``]]
    [[+name:is=`USER_LEFT_MEETING`:then=`Пользователь покинул мероприятие.`:else=``]]
</td>
</tr>