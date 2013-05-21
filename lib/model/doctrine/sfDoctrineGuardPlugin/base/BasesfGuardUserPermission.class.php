<?php

/**
 * BasesfGuardUserPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $permission_id
 * @property sfGuardUser $User
 * @property sfGuardPermission $Permission
 * 
 * @method integer               getUserId()        Returns the current record's "user_id" value
 * @method integer               getPermissionId()  Returns the current record's "permission_id" value
 * @method sfGuardUser           getUser()          Returns the current record's "User" value
 * @method sfGuardPermission     getPermission()    Returns the current record's "Permission" value
 * @method sfGuardUserPermission setUserId()        Sets the current record's "user_id" value
 * @method sfGuardUserPermission setPermissionId()  Sets the current record's "permission_id" value
 * @method sfGuardUserPermission setUser()          Sets the current record's "User" value
 * @method sfGuardUserPermission setPermission()    Sets the current record's "Permission" value
 * 
 * @package    toaberlin
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserPermission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_permission');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('permission_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardPermission as Permission', array(
             'local' => 'permission_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}