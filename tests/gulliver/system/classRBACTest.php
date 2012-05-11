<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.rbac.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:55.
  */ 

  class classRBACTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers RBAC::__construct
    * @todo   Implement test__construct().
    */
    public function test__construct() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( '__construct', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getSingleton
    * @todo   Implement testgetSingleton().
    */
    public function testgetSingleton() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getSingleton', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::initRBAC
    * @todo   Implement testinitRBAC().
    */
    public function testinitRBAC() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'initRBAC', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::loadUserRolePermission
    * @todo   Implement testloadUserRolePermission().
    */
    public function testloadUserRolePermission() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'loadUserRolePermission', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::checkAutomaticRegister
    * @todo   Implement testcheckAutomaticRegister().
    */
    public function testcheckAutomaticRegister() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'checkAutomaticRegister', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::VerifyWithOtherAuthenticationSource
    * @todo   Implement testVerifyWithOtherAuthenticationSource().
    */
    public function testVerifyWithOtherAuthenticationSource() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'VerifyWithOtherAuthenticationSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::VerifyLogin
    * @todo   Implement testVerifyLogin().
    */
    public function testVerifyLogin() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'VerifyLogin', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::verifyUser
    * @todo   Implement testverifyUser().
    */
    public function testverifyUser() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'verifyUser', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::verifyUserId
    * @todo   Implement testverifyUserId().
    */
    public function testverifyUserId() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'verifyUserId', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::userCanAccess
    * @todo   Implement testuserCanAccess().
    */
    public function testuserCanAccess() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'userCanAccess', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::createUser
    * @todo   Implement testcreateUser().
    */
    public function testcreateUser() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'createUser', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::updateUser
    * @todo   Implement testupdateUser().
    */
    public function testupdateUser() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'updateUser', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::assignRoleToUser
    * @todo   Implement testassignRoleToUser().
    */
    public function testassignRoleToUser() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'assignRoleToUser', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::removeRolesFromUser
    * @todo   Implement testremoveRolesFromUser().
    */
    public function testremoveRolesFromUser() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'removeRolesFromUser', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::changeUserStatus
    * @todo   Implement testchangeUserStatus().
    */
    public function testchangeUserStatus() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'changeUserStatus', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::removeUser
    * @todo   Implement testremoveUser().
    */
    public function testremoveUser() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'removeUser', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::load
    * @todo   Implement testload().
    */
    public function testload() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'load', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::createPermision
    * @todo   Implement testcreatePermision().
    */
    public function testcreatePermision() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'createPermision', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::listAllRoles
    * @todo   Implement testlistAllRoles().
    */
    public function testlistAllRoles() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'listAllRoles', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllRoles
    * @todo   Implement testgetAllRoles().
    */
    public function testgetAllRoles() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllRoles', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllRolesFilter
    * @todo   Implement testgetAllRolesFilter().
    */
    public function testgetAllRolesFilter() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllRolesFilter', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::listAllPermissions
    * @todo   Implement testlistAllPermissions().
    */
    public function testlistAllPermissions() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'listAllPermissions', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::createRole
    * @todo   Implement testcreateRole().
    */
    public function testcreateRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'createRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::removeRole
    * @todo   Implement testremoveRole().
    */
    public function testremoveRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'removeRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::verifyNewRole
    * @todo   Implement testverifyNewRole().
    */
    public function testverifyNewRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'verifyNewRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::updateRole
    * @todo   Implement testupdateRole().
    */
    public function testupdateRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'updateRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::loadById
    * @todo   Implement testloadById().
    */
    public function testloadById() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'loadById', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getRoleUsers
    * @todo   Implement testgetRoleUsers().
    */
    public function testgetRoleUsers() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getRoleUsers', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllUsersByRole
    * @todo   Implement testgetAllUsersByRole().
    */
    public function testgetAllUsersByRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllUsersByRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllUsersByDepartment
    * @todo   Implement testgetAllUsersByDepartment().
    */
    public function testgetAllUsersByDepartment() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllUsersByDepartment', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getRoleCode
    * @todo   Implement testgetRoleCode().
    */
    public function testgetRoleCode() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getRoleCode', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::deleteUserRole
    * @todo   Implement testdeleteUserRole().
    */
    public function testdeleteUserRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'deleteUserRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllUsers
    * @todo   Implement testgetAllUsers().
    */
    public function testgetAllUsers() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllUsers', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::assignUserToRole
    * @todo   Implement testassignUserToRole().
    */
    public function testassignUserToRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'assignUserToRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getRolePermissions
    * @todo   Implement testgetRolePermissions().
    */
    public function testgetRolePermissions() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getRolePermissions', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllPermissions
    * @todo   Implement testgetAllPermissions().
    */
    public function testgetAllPermissions() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllPermissions', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::assignPermissionRole
    * @todo   Implement testassignPermissionRole().
    */
    public function testassignPermissionRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'assignPermissionRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::assignPermissionToRole
    * @todo   Implement testassignPermissionToRole().
    */
    public function testassignPermissionToRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'assignPermissionToRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::deletePermissionRole
    * @todo   Implement testdeletePermissionRole().
    */
    public function testdeletePermissionRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'deletePermissionRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::numUsersWithRole
    * @todo   Implement testnumUsersWithRole().
    */
    public function testnumUsersWithRole() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'numUsersWithRole', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::createSystem
    * @todo   Implement testcreateSystem().
    */
    public function testcreateSystem() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'createSystem', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::verifyByCode
    * @todo   Implement testverifyByCode().
    */
    public function testverifyByCode() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'verifyByCode', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllAuthSources
    * @todo   Implement testgetAllAuthSources().
    */
    public function testgetAllAuthSources() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllAuthSources', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllAuthSourcesByUser
    * @todo   Implement testgetAllAuthSourcesByUser().
    */
    public function testgetAllAuthSourcesByUser() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllAuthSourcesByUser', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAuthenticationSources
    * @todo   Implement testgetAuthenticationSources().
    */
    public function testgetAuthenticationSources() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAuthenticationSources', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAuthSource
    * @todo   Implement testgetAuthSource().
    */
    public function testgetAuthSource() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAuthSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::createAuthSource
    * @todo   Implement testcreateAuthSource().
    */
    public function testcreateAuthSource() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'createAuthSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::updateAuthSource
    * @todo   Implement testupdateAuthSource().
    */
    public function testupdateAuthSource() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'updateAuthSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::removeAuthSource
    * @todo   Implement testremoveAuthSource().
    */
    public function testremoveAuthSource() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'removeAuthSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllUsersByAuthSource
    * @todo   Implement testgetAllUsersByAuthSource().
    */
    public function testgetAllUsersByAuthSource() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllUsersByAuthSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getListUsersByAuthSource
    * @todo   Implement testgetListUsersByAuthSource().
    */
    public function testgetListUsersByAuthSource() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getListUsersByAuthSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::searchUsers
    * @todo   Implement testsearchUsers().
    */
    public function testsearchUsers() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'searchUsers', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::requirePermissions
    * @todo   Implement testrequirePermissions().
    */
    public function testrequirePermissions() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'requirePermissions', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getAllFiles
    * @todo   Implement testgetAllFiles().
    */
    public function testgetAllFiles() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getAllFiles', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::getFilesTimestamp
    * @todo   Implement testgetFilesTimestamp().
    */
    public function testgetFilesTimestamp() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'getFilesTimestamp', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers RBAC::cleanSessionFiles
    * @todo   Implement testcleanSessionFiles().
    */
    public function testcleanSessionFiles() 
    { 
        if (class_exists('RBAC')) {
             $methods = get_class_methods( 'RBAC');
            $this->assertTrue( in_array( 'cleanSessionFiles', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 
