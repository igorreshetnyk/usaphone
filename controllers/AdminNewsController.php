<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminNewsController
 *
 * @author igor
 */
class AdminNewsController extends AdminBase{

    public function getLastNews () {

        self::checkAdmin();

    }
}
