[[!pdoResources?
&class=`Meetings`
&loadModels=`bbb`
&where=`["id_meeting = [[!getUrlParam?&name=`id_meeting` &int=`1`]]"]`
&tpl=`tpl.form.sent.invitation.tpl`
&sortby=`id_meeting`
&limit=`1`
&showLog=`0`
]]
[[!FormIt?
&hooks=`spam,sentInvitation,redirect`
&submitVar=`sentInvit-submit`
&redirectTo=`[[!getUrlParam?&name=`redirect` &int=`1`]]`
]]