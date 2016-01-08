<?php
$allowed_tags = $_POST['allowed_tags'];
$fields = $_POST['enable_html'];

foreach($fields as $field => $value){
    if(isset($_POST[$value]) && !empty($_POST[$value])){
        $output = strip_tags($_POST[$value],$allowed_tags);
        $hook->setValue($value,$output);
    }
}
return true;