[[!getCookie?
    &name=`bbb_meeting`
    &toPlaceholder=`bbb_meeting`
]]
[[!getCookie?
&name=`bbb_client`
&toPlaceholder=`bbb_client`
]]

[[!pdoResources?
    &loadModels=`bbb`
    &class=`Meetings`
    &where=`["id_meeting = [[+bbb_meeting:default=`[[!getUrlParam?&name=`id_met`]]`]]"]`
    &sortby=`id_meeting`
    &limit=`1`
    &showLog=`0`
    &tpl=`@INLINE <h4>Пожалуйста, оставьте ваш отзыв об участии в мероприятии <b>[[+name_meeting]]</b></h4>`
]]
[[!pdoResources?
&loadModels=`bbb`
&class=`Clients`
&where=`["id_client = [[+bbb_client:default=`[[!getUrlParam?&name=`id_cli`]]`]]"]`
&sortby=`id_client`
&limit=`1`
&showLog=`0`
&tpl=`@INLINE <p><b>[[+firstname]]</b>, спасибо за участие в мероприятии!</p><br>Мы будем очень благодарны, если вы оставите отзыв.`
]]
[[!$form.leave.feedback?
    &id_meeting=`[[+bbb_meeting:default=`[[!getUrlParam?&name=`id_met`]]`]]`
    &id_client=`[[+bbb_client:default=`[[!getUrlParam?&name=`id_cli`]]`]]`
]]
[[!FormIt?
&hooks=`spam,leaveFeedback`
&submitVar=`leaveFeedback-submit`
]]

[[!leftMeeting?
&id_meeting=`[[+bbb_meeting:default=`[[!getUrlParam?&name=`id_met`]]`]]`
&id_client=`[[+bbb_client:default=`[[!getUrlParam?&name=`id_cli`]]`]]`
]]