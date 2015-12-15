<!DOCTYPE html>
<html>
<head>
    [[$Head]]
    <script type="text/javascript" charset="utf-8">
        if(window.top==window) {
            // you're not in a frame so you reload the site
            window.setTimeout('location.reload()', 10000); //reloads after 10 seconds
        } else {
            //you're inside a frame, so you stop reloading
        }
    </script>
</head>
<body onload="">
[[$Navbar]]
<div class="container">
    [[$Crumbs]]
    <div id="content" class="inner">
        [[!pdoResources?
            &loadModels=`bbb`
            &class=`Meetings`
            &where=`["id_meeting = [[!getUrlParam?&name=`id_meeting` &int=`1`]]"]`
            &tpl=`@INLINE<h4> Ожидание начала мероприятия <b>"[[+name_meeting]]"</b></h4>`
            &sortby=``
            &showLog=`0`
        ]]
        [[!pdoResources?
            &loadModels=`bbb`
            &class=`Clients`
            &where=`["id_client = [[!getUrlParam?&name=`id_client` &int=`1`]]"]`
            &tpl=`@INLINE<p>Здравствуйте, <strong>[[+firstname]] [[+lastname]]</strong>. </p>`
            &sortby=``
            &showLog=`0`
        ]]

        [[!waitMeeting?
            &id_meeting=` [[!getUrlParam?&name=`id_meeting` &int=`1`]]`
            &id_client=` [[!getUrlParam?&name=`id_client` &int=`1`]]`
            &logonUrl=` [[!getUrlParam?&name=`logonUrl`]]`
        ]]
    </div>
    [[$Footer]]
</div>
</body>
</html>
