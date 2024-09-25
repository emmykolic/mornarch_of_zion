<?php
trait global_functions{
    public function xss ($txt){
        return htmlspecialchars($txt);
    }

    
}