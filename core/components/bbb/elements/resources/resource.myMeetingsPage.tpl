[[!setPlaceholdersFromRequest]]
<div class="well">
    <h4>Поиск мероприятий</h4>
    <form class="form-horizontal" action="" method="post">
        <div class="input-group">
            <input type="search" class="form-control" name="search_meeting" value="[[+search_meeting]]" placeholder="Все мои мероприятия">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"  name="find_meeting"><i class="fa fa-search"></i></button>
                        </span>
        </div>
        <!-- /.input-group -->
    </form>
</div>
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
        "Resource": "id, uri, content"
        }`
        &where=`["id_creator = [[!+modx.user.id]] [[+search_meeting:ne=``:then=`and (Meetings.name_meeting like '%[[+search_meeting]]%' OR Resource.content like '%[[+search_meeting]]%')`]] "]`
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
&submitVar=`newMeeting-submit`
&emailTo=`bav55@yandex.ru`
&emailSubject=`Создано новое мероприятие`
&emailTpl=`tpl.bbb.item`
&redirectTo=`[[*id]]`
]]