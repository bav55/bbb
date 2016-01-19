<!DOCTYPE html>
<html>
<head>
    [[$Head]]
</head>
<body>
[[$Navbar]]
<div class="container">
    [[!setPlaceholdersFromRequest]]
   [[+id_author:is=``:then=``:else=`
    [[pdoCrumbs?
    &showAtHome=`0`
    &showHome=`1`
    &exclude=`9`
    &outputSeparator=``
    &tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`
    &tplCurrent=`@INLINE <li class="active">[[!pdoUsers?
        &users=`[[+id_author]]`
        &groups=`Users`
        &showLog=`0`
        &tpl=`@INLINE [[+fullname]]`
        ]]</li>`
    &tplWrapper=`@INLINE <ol class="breadcrumb">[[+output]]</ol>`
    ]]`]]
    <div id="content" class="inner">
       [[+id_author:is=``:then=``:else=`
        [[!pdoUsers?
        &users=`[[+id_author]]`
        &groups=`Users`
        &showLog=`0`
        &tpl=`author.tpl`
        ]]`]]
        [[*content]]
    </div>
    [[$Footer]]
</div>
</body>
</html>