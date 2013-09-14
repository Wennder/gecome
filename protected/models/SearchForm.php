<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class SearchForm extends CFormModel {

    public $search;
    
    public function rules() {
        return array(
            array('search', 'required'),
        );
    }
    
    public function attributeLabels() {
        return array(
            'serach' => 'Search',
        );
    }

    
}

?>
