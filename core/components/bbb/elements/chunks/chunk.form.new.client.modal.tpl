
<div id="NewClientModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Добавить новый контакт</h4>
            </div>
            <div class="modal-body">
                [[$tpl.form.new.client]]
            </div>
            <div class="modal-footer" style="border:0">
                <button type="button" form="NewClientForm" class="btn btn-default" data-dismiss="modal">Отменить</button>
                <input form="NewClientForm" type="submit" class="btn btn-primary" name="newClient-submit" value="Добавить контакт">
            </div>
        </div>
    </div>
</div>