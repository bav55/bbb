<!-- meeting -->
   <div class="col-xs-12 thumbnail">
    <div class="col-md-3">
        <div class="center-block text-center">
            <a href="[[+uri]]">
                <img class="img-responsive" src="[[+value:phpthumbof=`w=200&h=200`]]" alt="">
            </a>
        </div>
    </div>
    <div class="col-md-9">

                <a href="[[+uri]]">
                <h3>[[+name_meeting]]</h3></a>
                <h4>Ведущий: [[+fullname]]</h4>
                 <h5>Дата и время начала: <b>[[+date_meeting:strtotime:date=`%d.%m.%Y, %H:%M`]]</b> (<i>Время Московское)</i></h5>

        <p>[[+content:ellipsis=`400`]]</p>
        <a class="btn btn-primary" href="[[+uri]]">Подробнее...</i></a>
        <p></p>
    </div>
  </div>
