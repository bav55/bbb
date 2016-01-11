<div class="col-md-4">
    <div class="panel panel-default" style="height: 390px;">
        <div class="panel-heading">
            <h3 class="text-center"><a href="[[~96]]?&id_author=[[+id_creator]]">[[+fullname]]</a></h3>
        </div>
        <div class="panel-body">
            [[+extended.about_me:is=``:then=`<div class="alert alert-warning"><p class="text-center"><br><br><br><br>Автор пока не заполнил <br>информацию о себе.<br><br><br><br></p></div>`:else=`<a href="[[~96]]?&id_author=[[+id_creator]]">
                <img class="img-responsive pull-left" style="margin: 5px;" src="[[+photo:phpthumbof=`w=150&h=150`]]" alt="">
            </a><p>[[+extended.about_me:ellipsis=`280`]]</p>`]]
            <a class="btn btn-default" href="[[~96]]?&id_author=[[+id_creator]]">Подробнее...</a>

        </div>
    </div>
</div>