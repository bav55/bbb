[[!setPlaceholdersFromRequest]]
<div class=" well">
    <h4>Поиск мероприятий</h4>
    <form class="form-horizontal" action="" method="post">
        <div class="input-group">
            <input type="search" class="form-control" name="search_meeting" value="[[+search_meeting]]" placeholder="Все мероприятия">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
        </div>
        <!-- /.input-group -->
    </form>
</div>

[[!pdoPage?
&element=`pdoResources`
&pageLimit=`7`
&limit=`10`
&loadModels=`bbb`
&class=`Meetings`
&leftJoin=`{
"Resource":{
"class": "modResource",
"on": "Resource.id = Meetings.id_resource"
},
"Profile":{
"class": "modUserProfile",
"on": "Meetings.id_creator = Profile.internalKey"
},
"TVResource":{
"class": "modTemplateVarResource",
"on": "Resource.id = TVResource.contentid"
},
"TV":{
"class": "modTemplateVar",
"on": "TVResource.tmplvarid= TV.id"
}
}`
&select=`{
"Meetings": "*",
"TVResource": "*",
"TV": "id,name",
"Resource": "id,uri,content",
"Profile": "fullname,email as email_creator"
}`
&where=`["TV.name='image_meeting' [[+search_meeting:ne=``:then=`and (Meetings.name_meeting like '%[[+search_meeting]]%' OR Resource.content like '%[[+search_meeting]]%')`]]"]`
&parents=`[[+bbb_root_meeting_id]]`
&showLog=`0`
&tpl=`all-meetings.item.tpl`
&sortby=`date_meeting`
&sortdir=`DESC`
&ajaxMode=`button`
&ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">Загрузить еще</button></p>`
&ajaxElemWrapper=`#pdopage`
&ajaxElemRows=`#pdopage .rows`
&ajaxElemPagination=`#pdopage .pagination`
&ajaxElemLink=`#pdopage .pagination a`
&ajaxElemMore=`#pdopage .btn-more`
&toPlaceholder=`all_meetings`
&pageNavVar=`page.nav`
&pageVarKey=`page`
&totalVar=`page.total`
]]
[[+all_meetings:is=``:then=`<div class="alert alert-info">Мероприятий не найдено</div>`:else=``]]
<div id="pdopage">
    <div class="rows">
        [[+all_meetings]]
    </div>
    [[+page.nav]]
</div>