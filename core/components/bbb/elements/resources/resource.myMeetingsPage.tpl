[[!setPlaceholdersFromRequest]]
<div class="container">
<div class="row">
    <div class="col-xs-12 col-lg-4 col-lg-offset-4 text-center">
    <a href="#NewMeetingModal" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#NewMeetingModal">
        Запланировать новое мероприятие
    </a>
        <p>&nbsp;</p>
    </div>
</div>
</div>
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
        &class=`modResource`
        &loadModels=`bbb`
        &leftJoin =`{
        "Meetings":{
        "class": "Meetings",
        "on": "modResource.id = Meetings.id_resource"
        }
        }`
        &select=`{
        "Meetings": "*",
        "modResource": "id, uri, content"
        }`
        &where=`["Meetings.id_creator = [[!+modx.user.id]] [[+search_meeting:ne=``:then=`and (Meetings.name_meeting like '%[[+search_meeting]]%' OR modResource.content like '%[[+search_meeting]]%')`]] "]`
        &includeTVs=`image_meeting`
        &parents=`[[++bbb_root_meeting_id]]`
        &limit=`10`
        &sortby=`Meetings.date_meeting`
        &sortdir=`DESC`
        &pageLimit=`7`
        &return=`tpl`
        &ajaxMode=`button`
        &ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">Загрузить еще</button></p>`
        &ajaxElemWrapper=`#pdopage`
        &ajaxElemRows=`#pdopage .rows`
        &ajaxElemPagination=`#pdopage .pagination`
        &ajaxElemLink=`#pdopage .pagination a`
        &ajaxElemMore=`#pdopage .btn-more`
        &toPlaceholder=`my_meetings`
        &pageNavVar=`page.nav`
        &pageVarKey=`page`
        &totalVar=`page.total`
        ]]
        [[+my_meetings:is=``:then=`<div class="alert alert-info">Мероприятий не найдено</div>`:else=``]]
        <div id="pdopage">
            <div class="rows">
                [[+my_meetings]]
             </div>
            [[+page.nav]]
        </div>
    </div>

</div>
<div class="clearfix"></div>

<!-- 1 -->
[[!$tpl.form.new.meeting.modal]]


[[!FormIt?
&hooks=`spam,createMeeting,email,redirect`
&submitVar=`newMeeting-submit`
&validate=`name_meeting:required,date_meeting:required,duration:required,maxParticipants:required`
&emailTo=`support@web-meeting.ru`
&emailSubject=`[[+date_meeting:strtotime:date=`%d.%m.%Y, %H:%M`]] - [[!+modx.user.id:userinfo=`fullname`]] - [[+name_meeting]] - Создано новое мероприятие`
&emailTpl=`new.meeting.inform.tpl`
&redirectTo=`[[*id]]`
]]