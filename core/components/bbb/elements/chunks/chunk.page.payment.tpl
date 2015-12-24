<p>[[+firstname]], ваша заявка на участие в мероприятии успешно отправлена ведущему!</p>
Вы можете прямо сейчас оплатить свое участие в мероприятии <b>[[+name_meeting]]</b>, либо сделать это позднее. <br> Мы отправили на ваш адрес электронной почты сообщение, в котором содержится ссылка для оплаты.</p>

[[+extended.YandexMoney:is='':then=`<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p>Извините, оплата не может быть выполнена, поскольку ведущий меропрития не указал свои платежные реквизиты.</p>
</div>`:else=`
<iframe frameborder="0" allowtransparency="true" scrolling="no" class="center-block"
        src="https://money.yandex.ru/embed/shop.xml?account=[[+extended.YandexMoney]]
                &quickpay=shop
                &payment-type-choice=on
                &mobile-payment-type-choice=on
                &writer=seller&targets=Оплата участия в мероприятии: [[+name_meeting:htmlent]], [[+firstname]] [[+lastname]] ([[+email]])&targets-hint=&default-sum=[[+cost]]&button-text=01&successURL=[[+successPage]]%3F%26id_client%3D[[+id_client]]%26id_meeting%3D[[+id_meeting]]" width="500" height="300">
</iframe>`]]
