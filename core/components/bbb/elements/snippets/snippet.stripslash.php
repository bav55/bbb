<?php
if (isset($scriptProperties['str'])  && is_string($scriptProperties['str'])) {
    return stripslashes($scriptProperties['str']);
}
else return false;
?>