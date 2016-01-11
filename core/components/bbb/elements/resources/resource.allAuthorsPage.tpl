[[!setPlaceholdersFromRequest]]
<div class="well">
    <h4>Поиск авторов</h4>
    <form class="form-horizontal" action="" method="post">
        <div class="input-group">
            <input type="search" class="form-control" name="search_author" value="[[+search_author]]" placeholder="Все авторы - ведущие">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
        </div>
        <!-- /.input-group -->
    </form>
</div>

[[!pdoPage?
&snippet=`pdoResources`
&loadModels=`bbb`
&class=`modUserProfile`
&leftJoin=`{
"Meetings":{
"class": "Meetings",
"on": "Meetings.id_creator = modUserProfile.internalKey"
}
}`
&select=`{
"Meetings": "count(id_meeting)",
"modUserProfile": "photo,internalKey as id_creator,fullname,email as email_creator,extended"
}`
&groupby=`internalKey`
&where=`["id_meeting<>'' [[+search_author:ne=``:then=` and modUserProfile.fullname like '%[[+search_author]]%'`]]"]`
&showLog=`0`
&tpl=`all-authors.item.tpl`
&sortby=`fullname`
&sortdir=`ASC`
&limit=`3`
&pageLimit=`7`
&toPlaceholder=`all_authors`
&ajaxMode=`button`
&ajaxTplMore=`@INLINE <p class="center-block"><br> <button class="btn btn-default btn-more">Загрузить еще</button></p>`
&ajaxElemWrapper=`#pdopage`
&ajaxElemRows=`#pdopage .rows`
&ajaxElemPagination=`#pdopage .pagination`
&ajaxElemLink=`#pdopage .pagination a`
&ajaxElemMore=`#pdopage .btn-more`
&pageNavVar=`page.nav`
&pageVarKey=`page`
&totalVar=`page.total`
]]
[[+all_authors:is=``:then=`<div class="alert alert-info">Авторов  не найдено</div>`:else=``]]
<div class="row">
        <div id="pdopage">
            <div class="rows">
                 [[+all_authors]]
             </div>
                [[+page.nav]]
        </div>
</div>