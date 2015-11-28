<h3>[[*name_meeting]]</h3>
<div class="row">
    <aside class="col-xs-12 col-sm-3 col-lg-3">
        <a href="#">
          <!--  <img src="holder.js/250x250" class="img-responsive thumbnail" alt=""> -->
             <img src="[[+tv.image_meeting]]" class="img-responsive thumbnail center-block" alt="">
        </a>
        <div class="caption text-center">
            <h5>Ведущий: <b>[[+fullname]]</b></h5>
            <p>Дата и время мероприятия: </p>
            <p><b>[[+date_meeting:strtotime:date=`%d.%m.%Y, %H:%M`]]<br/> <small>(время Московское)</small></b></p>
        </div>
    </aside>
    <article class="col-xs-12 col-sm-5 col-lg-5">
        [[*content]]
    </article>
    <aside class="col-xs-12 col-sm-4 col-lg-4">
        [[$tpl.form.request?id_meeting=[[+id_meeting]]&id_creator=[[+id_creator]]]]
    </aside>
</div>
[[!+modx.user.id:is=`[[+id_creator]]`:then=`
<div class="row">
    <div class="col-xs-12 col-sm-12 col-lg-12">
        Служебная информация
    </div>
</div>`:else=``]]
