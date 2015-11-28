<!DOCTYPE html>
<html>
<head>
    [[$Head]]
</head>
<body>
[[$Navbar]]
<div class="container">
    [[$Crumbs]]
    <div id="content" class="inner">
        [[!pdoResources?
        &loadModels=`bbb`
        &class=`modResource`
        &leftJoin=`{
        "Meetings":{
        "class": "Meetings",
        "on": "modResource.id = Meetings.id_resource"
        },
        "Profile":{
        "class": "modUserProfile",
        "on": "Meetings.id_creator = Profile.internalKey"
        }
        }`
        &select=`{
        "Meetings": "*",
        "modResource": "id",
        "Profile": "fullname,email as email_creator, email"
        }`
        &includeTVs=`image_meeting`
        &where=`["modResource.id = [[*id]]"]`
        &parents=`0`
        &limit=`1`
        &showLog=`0`
        &tpl=`tpl.meeting.info`
        ]]


    </div>
    [[$Footer]]
</div>
</body>
</html>