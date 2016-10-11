<?php
/**
 * Rizki Herdatullah
 * Web Developer, Front-End Designer, and Project Manager
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  =======================================
 *  Author     : Muhammad Surya Ikhsanudin
 *  License    : Protected
 *  Email      : mutofiyah@gmail.com
 *
 *  Dilarang merubah, mengganti dan mendistribusikan
 *  ulang tanpa sepengetahuan Author
 *  =======================================
 */
require_once APPPATH."/libraries/PHPExcel.php";

class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}