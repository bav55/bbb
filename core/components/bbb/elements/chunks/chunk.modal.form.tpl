<!--
Оборачивает форму в модальное окно с помощью Bootstrap 3
1. modal-id
2. form-id
3. title
4. size (modal-lg,modal-sm)
5. success-title
6. cancel-title
7. form-chunk
-->
<div id="[[+modal-id]]" class="modal fade">
    <div class="modal-dialog [[+size]]">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">[[+title]]</h4>
            </div>
            <div class="modal-body">
                               [[$[[+form-chunk]]]]
            </div>
            <div class="modal-footer">
                <button type="button" form="[[+form-id]]" class="btn btn-default" data-dismiss="modal">[[+cancel-title]]</button>
                <button form="[[+form-id]]" type="submit" class="btn btn-primary">[[+success-title]]</button>
            </div>
        </div>
    </div>
</div>