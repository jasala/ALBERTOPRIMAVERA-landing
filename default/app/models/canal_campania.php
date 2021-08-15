<?php

class CanalCampania extends ActiveRecord{
    
    public function crear($canal) {
        $this->canal = $canal;
        
        if($this->save()){
            return $this->id;
        }
        else{
            return 0;
        }
    }
    
}
?>
