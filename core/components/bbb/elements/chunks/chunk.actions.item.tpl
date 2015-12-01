<tr [[+name:is=`RECEIVED_REQUEST`:then=`class="success"`:else=``]]
[[+name:is=`SENT_INVITATION`:then=`class="warning"`:else=``]]
>
<td>
    [[+timestamp_action:strtotime:date=`%d.%m.%Y, %H:%M:%S`]]
</td>
<td>
    [[+firstname]]&nbsp;[[+lastname]]([[+email]])
</td>
<td>
    [[+name:is=`RECEIVED_REQUEST`:then=`<a href="[[getJoinMeetingUrl?id_client=`[[+id_client]]`&id_meeting=`[[+id_meeting]]`&user_type=`attendee`&id_waitpage=`[[++bbb_id_waitpage]]`]]">Пользователь подал заявку через сайт</a>`:else=``]]
    [[+name:is=`SENT_INVITATION`:then=`Приглашение отправлено пользователю`:else=``]]
</td>
<td class="text-center">
    <input type="checkbox" name="clients[]" value=[[+id_client]]>
</td>
</tr>