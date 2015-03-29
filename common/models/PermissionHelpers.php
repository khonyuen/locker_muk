<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\models;

use common\models\ValueHelpers;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class PermissionHelpers
{

    public static function userMustBeOwner($model_name, $model_id)
    {
        $connection = Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "select id from $model_name where user_id=:userid and id=:model_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $command->bindValue(":model_id", $model_id);
        if ($result = $command->queryOne()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function requireMinimumState($status_name)
    {
        if (Yii::$app->user->identity->status_id >= ValueHelpers::getStatusValue($status_name)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function requireMinimumRole($role_name, $userId = null)
    {
        if (ValueHelpers::getRoleValue($role_name)) {
            switch ($userId) {
                case $userId == null :
                    $userRoleValue = ValueHelpers::getUsersRoleValue();
                    break;
                case $userId != null :
                    $userRoleValue = ValueHelpers::getUsersRoleValue($userId);
                    break;
            } //end of switch
            return $userRoleValue >= ValueHelpers::getRoleValue($role_name) ? true : false;
        } else {
            return false;
        }
    }

    public static function requireRole($role_name)
    {
        if (Yii::$app->user->identity->role_id == ValueHelpers::getRoleValue($role_name)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*public function requireMinimumRole($role_name)
    {
        if (Yii::$app->user->identity->role_id >= ValueHelpers::getRoleValue($role_name)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }*/

    public static function requireUpgradeTo($user_type_name, $redirect_destination = '')
    {
        if (Yii::$app->user->identity->user_type_id != ValueHelpers::getUserTypeValue($user_type_name)) {
            return false;
            //return \Yii::$app->getResponse()->redirect(Url::to([$redirect_destination]));
        }
    }

    public static function requireStatus($status_name)
    {
        if (Yii::$app->user->identity->status_id == ValueHelpers::getStatusValue($status_name)) {
            return true;
        } else {
            return false;
        }
    }

}
