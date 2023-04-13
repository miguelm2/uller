<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';

class ServiceDashboard extends System
{
    public static function getListUrl()
    {
        try {
            $listUrl = array();

            if($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5){
                $listUrl[0] = '../../assets/html/sidebar-admin.php';
                $listUrl[1] = "../admin/index";
                $listUrl[2] = "../admin/users-profile";
            }else{
                $listUrl[0] = '../../assets/html/sidebar-user.php';
                $listUrl[1] = "../user/index";
                $listUrl[2] = "../user/users-profile";
            }

            return $listUrl;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>