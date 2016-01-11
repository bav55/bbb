[[!pdoResources?
&limit=`6`
&loadModels=`bbb`
&class=`Meetings`
&leftJoin=`{
"Resource":{
"class": "modResource",
"on": "Resource.id = Meetings.id_resource"
},
"Profile":{
"class": "modUserProfile",
"on": "Meetings.id_creator = Profile.internalKey"
},
"TVResource":{
"class": "modTemplateVarResource",
"on": "Resource.id = TVResource.contentid"
},
"TV":{
"class": "modTemplateVar",
"on": "TVResource.tmplvarid= TV.id"
}
}`
&select=`{
"Meetings": "*",
"TVResource": "*",
"TV": "id,name",
"Resource": "id,uri,content",
"Profile": "fullname,email as email_creator"
}`
&where=`["TV.name='image_meeting' and Meetings.date_meeting between '[[!getDate:date=`%Y-%m-%d`]]' and '[[!getDate:date=`%Y-%m-%d`? &offset=`2 weeks`]]'"]`
&parents=`[[+bbb_root_meeting_id]]`
&showLog=`0`
&tpl=`all-meetings.item.tpl`
&sortby=`date_meeting`
&sortdir=`ASC`
]]