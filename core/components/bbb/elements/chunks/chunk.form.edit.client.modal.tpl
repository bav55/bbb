<div id="EditClientModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Редактировать данные контакта</h4>
            </div>
            <div class="modal-body">
                [[!$tpl.form.new.client]]
            </div>
            <div class="modal-footer" style="border:0px;">
                <input type="button" form="NewClientForm" class="btn btn-default" data-dismiss="modal" value="Отменить">
                <input form="NewClientForm" type="submit" class="btn btn-primary" name="editClient-submit" value="Сохранить изменения">
            </div>
        </div>
    </div>
</div>