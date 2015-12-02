<h4 class="text-center">"[[+name_meeting]]", ведущий: [[!+modx.user.id:userinfo=`fullname`]], начало: [[+date_meeting:strtotime:date=`%d.%m.%Y, %H:%M`]]</h4>
<div class="container">
    <br/>
<form class="form" method="post" action="">
    <input style="display:none;" type="text" name="email_" value="" />
    <input type="hidden" name="id_meeting" value="[[+id_meeting]]">
    <div class="form-group" style="height=300px; overflow:auto;">
        [[!pdoResources?
        &class=`Clients`
        &loadModels=`bbb`
        &tpl=`client.check.item.tpl`
        &where=`["id_creator = [[+modx.user.id]]"]`
        &sortby=`id_client`
        &showLog=`0`
        ]]
    </div>
    <div class="form-group col-xs-12">
            <textarea rows="12" class="form-control" name="message">
                [[!pdoUsers?
                &tpl=`@INLINE[[+extended.invitation_template]]`
                &users=`[[+modx.user.id]]`
                ]]
            </textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="sentInvit-submit" class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 btn btn-primary" value="Отправить приглашения">
    </div>
</form>
</div>