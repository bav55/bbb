<hr/>
<div class="container">
    <div class="row">
[[!pdoPage?
&snippet=`pdoResources`
&tpl=`meeting.item.tpl`
&showLog=`0`
&class=`Meetings`
&loadModels=`bbb`
&leftJoin =`{
"Resource": {
"class": "modResource",
"on": "Meetings.id_resource = Resource.id"
}
}`
&select=`{
"Meetings": "*",
"Resource": "id, uri"
}`
&where=`["id_creator = [[+modx.user.id]]"]`
&limit=`10`
&sortby=`id_meeting`
&sortdir=`ASC`
&pageLimit=`7`
&return=`tpl`
]]
        <hr/>
    </div>
    <div class="row center-block>">
        [[+page.nav]]
    </div>
    <div class="row center-block>">
<a href="#NewMeetingModal" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#NewMeetingModal">
    Запланировать новое мероприятие
</a>
    </div>
</div>
<div class="clearfix"></div>

<!-- 1 -->
[[!$tpl.form.new.meeting.modal]]


[[!FormIt?
&hooks=`spam,createMeeting,email,redirect`
&emailTo=`bav55@yandex.ru`
&emailSubject=`Создано новое мероприятие`
&emailTpl=`tpl.bbb.item`
&redirectTo=`[[*id]]`
]]