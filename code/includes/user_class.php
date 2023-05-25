<?php
class User {
    private $name;
    private $role;

    public function set_name($name){
        $this->name = $name;
    }
    public function set_role($role){
        $this->role = $role;
    }

    public function get_name(){
        return $this->name;
    }
    public function get_role(){
        return $this->role;
    }
}
