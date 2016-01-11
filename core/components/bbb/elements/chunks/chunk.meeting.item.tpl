    <div class="col-xs-12 col-md-12 thumbnail">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <div class="center-block text-center">
                    <a href="[[+uri]]"> <img src="[[+tv.image_meeting:phpthumbof=`w=150&h=150&q=100`]]"  alt=""></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-5 text-center">
                <p>
                       <a href="[[+uri]]">
                        <h4>[[+name_meeting]]</h4>
                     </a>
                    <small>[[+date_meeting:strtotime:date=`%d.%m.%Y, %H:%M`]] (время Московское)</small>
                </p>
                    <p>
                  <!--  Поступило заявок: <b>[[+request_count:ne=``:then=`[[+request_count]]`]]</b><br>
                    Отправлено приглашений: <b>[[+invite_count:ne=``:then=`[[+invite_count]]`]]</b><br> -->
                    </p>
            </div>
        <div class="col-xs-12 col-sm-4">
            <p>&nbsp;</p>
            <p> Стоимость участия: <b>[[+cost]] руб.</b></p>
            <p>Продолжительность: <b>[[+duration]] минут</b></p>
            <p>Максимум участников: <b>[[+maxParticipants]] чел.</b></p>
        </div>
    </div>
