<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


class RbacController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    public function actionTemp()
    {
        echo 'test';
    }

    public function actionRbac()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('seller');
        $role->description = 'Продавец';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('customer');
        $role->description = 'Покупатель';
        Yii::$app->authManager->add($role);

        return 'good';
    }


    public function actionPermit()
    {
        $permit = Yii::$app->authManager->createPermission('createLot');
        $permit->description = 'Право на создании товара';
        Yii::$app->authManager->add($permit);

        $permit = Yii::$app->authManager->createPermission('buyLot');
        $permit->description = 'Право на покупку товара';
        Yii::$app->authManager->add($permit);

        $permit = Yii::$app->authManager->createPermission('canAdmin');
        $permit->description = 'Администрирование';
        Yii::$app->authManager->add($permit);

        return 'good';
    }


    public function actionInheritance()
    {
        $role = Yii::$app->authManager->getRole('customer');
        $permit = Yii::$app->authManager->getPermission('buyLot');
        Yii::$app->authManager->addChild($role, $permit);

        $role = Yii::$app->authManager->getRole('seller');
        $permit = Yii::$app->authManager->getPermission('buyLot');
        Yii::$app->authManager->addChild($role, $permit);

        $role = Yii::$app->authManager->getRole('seller');
        $permit = Yii::$app->authManager->getPermission('createLot');
        Yii::$app->authManager->addChild($role, $permit);

        $role = Yii::$app->authManager->getRole('admin');
        $role2 = Yii::$app->authManager->getRole('customer');
        $role3 = Yii::$app->authManager->getRole('seller');
        $permit = Yii::$app->authManager->getPermission('canAdmin');

        Yii::$app->authManager->addChild($role, $role2);
        Yii::$app->authManager->addChild($role, $role3);
        Yii::$app->authManager->addChild($role, $permit);

        return 'good';
    }
//    public function actionInit()
//    {
//        $authManager = \Yii::$app->authManager;
//
//        // Create roles
//        $guest  = $authManager->createRole('guest');
//        $customer  = $authManager->createRole('customer');
//        $seller = $authManager->createRole('seller');
//        $admin  = $authManager->createRole('admin');
//
//        // Create simple, based on action{$NAME} permissions
//        $login  = $authManager->createPermission('login');
//        $logout = $authManager->createPermission('logout');
//        $error  = $authManager->createPermission('error');
//        $signUp = $authManager->createPermission('sign-up');
//        $index  = $authManager->createPermission('index');
//        $view   = $authManager->createPermission('view');
//        $update = $authManager->createPermission('update');
//        $delete = $authManager->createPermission('delete');
//
//        // Add permissions in Yii::$app->authManager
//        $authManager->add($login);
//        $authManager->add($logout);
//        $authManager->add($error);
//        $authManager->add($signUp);
//        $authManager->add($index);
//        $authManager->add($view);
//        $authManager->add($update);
//        $authManager->add($delete);
//
//
//        // Add rule, based on UserExt->group === $user->group
//        $userGroupRule = new UserGroupRule();
//        $authManager->add($userGroupRule);
//
//        // Add rule "UserGroupRule" in roles
//        $guest->ruleName  = $userGroupRule->name;
//        $customer->ruleName  = $userGroupRule->name;
//        $seller->ruleName = $userGroupRule->name;
//        $admin->ruleName  = $userGroupRule->name;
//
//        // Add roles in Yii::$app->authManager
//        $authManager->add($guest);
//        $authManager->add($customer);
//        $authManager->add($seller);
//        $authManager->add($admin);
//
//        // Add permission-per-role in Yii::$app->authManager
//        // Guest
//        $authManager->addChild($guest, $login);
//        $authManager->addChild($guest, $logout);
//        $authManager->addChild($guest, $error);
//        $authManager->addChild($guest, $signUp);
//        $authManager->addChild($guest, $index);
//        $authManager->addChild($guest, $view);
//
//        // BRAND
//        $authManager->addChild($customer, $update);
//        $authManager->addChild($customer, $guest);
//
//        // TALENT
//        $authManager->addChild($seller, $update);
//        $authManager->addChild($seller, $guest);
//
//        // Admin
//        $authManager->addChild($admin, $delete);
//        $authManager->addChild($admin, $customer);
//        $authManager->addChild($admin, $seller);
//    }

}