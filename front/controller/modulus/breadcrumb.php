<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Breadcrumb {

    public $page;
    public $list;

    public function add($array) {
        $this->list[] = $array;
    }
    public function respon(){
         return $this->list;
    }

}
