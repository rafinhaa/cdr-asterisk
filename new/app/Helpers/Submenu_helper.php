<?php

function menu($menuActive,$value,$return){
    if(isset($menuActive['col']) && $menuActive['col'] == $value){
        return $return;
    }else if(isset($menuActive['active']) && $menuActive['active'] == $value){
        return $return;
    }
}

?>