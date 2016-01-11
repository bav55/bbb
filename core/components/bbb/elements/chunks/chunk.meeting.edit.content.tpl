<h4>Разместите информацию о мероприятии</h4>
<form class="form" method="post" action="[[~[[*id]]]]" enctype="multipart/form-data">
    <input style="display:none;" type="text" name="email_" value="" />
    <input type="hidden" name ="id_resource" value="[[*id]]">
    <div class="form-group">
        <label for="image_meeting" class="control-label"><span>Изображение к мероприятию:</span></label>
        <input type="file" class="form-control" name="image_meeting" id="image_meeting"/>
    </div>
    <div class="form-group">
        <label for="content_meeting" class="control-label"><span>Сведения о мероприятии:</span></label>
        <textarea rows="10" class="form-control" style="resize: none;" id="content_meeting" name="content_meeting">[[*content]]</textarea>
    </div>
    <div class="form-group col-xs-12">
        <input type="button" class="btn btn-default col-xs-offset-3 col-xs-2" value="Отменить">
        <input type="submit" class="btn btn-primary col-xs-offset-1 col-xs-2" name="editContent-submit" value="Сохранить">
    </div>
</form>