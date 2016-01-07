
<div id="NewMeetingModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Создать новое мероприятие</h4>
            </div>
            <div class="modal-body">
                [[$tpl.form.new.meeting]]
            </div>
            <div class="modal-footer" style="border:0px;">
                <button type="button" form="NewMeetingForm" class="btn btn-default" data-dismiss="modal">Отменить</button>
                <input form="NewMeetingForm" type="submit" class="btn btn-primary" name="newMeeting-submit" value="Создать мероприятие">
            </div>
        </div>
    </div>
</div>