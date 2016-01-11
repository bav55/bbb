<h3>[[+fullname]]</h3>
<div class="row">
    <div class="col-xs-12 col-sm-3">
        <img class="img-responsive  thumbnail center-block" src="[[+photo:phpthumbof=`w=300&q=100`]]" alt="[[+fullname]]">
    </div>
    <div class="col-sm-9 col-xs-12">
        [[+extended.about_me:is=``:then=`<div class="alert alert-warning"><p>Автор пока не заполнил информацию о себе.</p></div>`:else=`[[+extended.about_me]]`]]
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h4>[[+fullname]] - Мероприятия</h4>
        <div class="col-xs-12 well">
            <form class="form-horizontal" action="" method="post">
                <div class="input-group">
                    <input type="search" class="form-control" name="search_meeting" value="[[+search_meeting]]" placeholder="Все мероприятия этого автора (ведущего)">
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
        &limit=`5`
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
        "Resource": "id,content,uri",
        "Profile": "fullname,email as email_creator"
        }`
        &where=`["Meetings.id_creator = [[+id_author]] and  TV.name='image_meeting' [[+search_meeting:ne=``:then=`and (Meetings.name_meeting like '%[[+search_meeting]]%' OR Resource.content like '%[[+search_meeting]]%')`]]"]`
        &parents=`[[+bbb_root_meeting_id]]`
        &showLog=`0`
        &tpl=`all-meetings.item.tpl`
        &sortby=`date_meeting`
        &sortdir=`DESC`
        &ajaxMode=`button`
        &ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">[[%pdopage_more]]</button></p>`
        &ajaxElemWrapper=`#pdopage`
        &ajaxElemRows=`#pdopage .rows`
        &ajaxElemPagination=`#pdopage .pagination`
        &ajaxElemLink=`#pdopage .pagination a`
        &ajaxElemMore=`#pdopage .btn-more`
        &toPlaceholder=`meetings1`
        &pageNavVar=`page.nav`
        &pageVarKey=`page`
        &totalVar=`page.total`
        ]]
        [[+meetings1:is=``:then=`<p class="alert alert-info">Мероприятий  не найдено</p>`:else=``]]
        <div id="pdopage">
            <div class="rows">
                [[+meetings1]]
            </div>
            [[+page.nav]]
        </div>
    </div>
</div>