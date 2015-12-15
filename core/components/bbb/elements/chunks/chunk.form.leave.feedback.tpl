<form class="form-horizontal" method="post" action="[[~[[*id]]]]">
    <input style="display:none;" type="text" name="email_" value="" />
    <input type="hidden" name="id_client" value="[[+id_client]]" />
    <input type="hidden" name="id_meeting" value="[[+id_meeting]]" />
    <div class="form-group col-xs-12">
        <label class="form-label" for="feedback">Ваш отзыв: </label>
        <textarea class="form-control" name="feedback" id="feedback" rows="10" required>
        </textarea>
    </div>
    <div class="form-group col-xs-12">
            <input type="submit" value="Отправить отзыв" class="btn btn-primary" name="leaveFeedback-submit">
    </div>

</form>