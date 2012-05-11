<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.templatePower.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:56.
  */ 

  class classTemplatePowerTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers TemplatePower::TemplatePower
    * @todo   Implement testTemplatePower().
    */
    public function testTemplatePower() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'TemplatePower', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::__deSerializeTPL
    * @todo   Implement test__deSerializeTPL().
    */
    public function test__deSerializeTPL() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( '__deSerializeTPL', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::__makeContentRoot
    * @todo   Implement test__makeContentRoot().
    */
    public function test__makeContentRoot() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( '__makeContentRoot', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::__assign
    * @todo   Implement test__assign().
    */
    public function test__assign() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( '__assign', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::__assignGlobal
    * @todo   Implement test__assignGlobal().
    */
    public function test__assignGlobal() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( '__assignGlobal', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::__outputContent
    * @todo   Implement test__outputContent().
    */
    public function test__outputContent() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( '__outputContent', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::__printVars
    * @todo   Implement test__printVars().
    */
    public function test__printVars() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( '__printVars', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::serializedBase
    * @todo   Implement testserializedBase().
    */
    public function testserializedBase() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'serializedBase', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::showUnAssigned
    * @todo   Implement testshowUnAssigned().
    */
    public function testshowUnAssigned() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'showUnAssigned', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::prepare
    * @todo   Implement testprepare().
    */
    public function testprepare() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'prepare', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::newBlock
    * @todo   Implement testnewBlock().
    */
    public function testnewBlock() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'newBlock', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::assignGlobal
    * @todo   Implement testassignGlobal().
    */
    public function testassignGlobal() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'assignGlobal', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::assign
    * @todo   Implement testassign().
    */
    public function testassign() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'assign', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::gotoBlock
    * @todo   Implement testgotoBlock().
    */
    public function testgotoBlock() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'gotoBlock', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::getVarValue
    * @todo   Implement testgetVarValue().
    */
    public function testgetVarValue() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'getVarValue', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::printToScreen
    * @todo   Implement testprintToScreen().
    */
    public function testprintToScreen() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'printToScreen', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers TemplatePower::getOutputContent
    * @todo   Implement testgetOutputContent().
    */
    public function testgetOutputContent() 
    { 
        if (class_exists('TemplatePower')) {
             $methods = get_class_methods( 'TemplatePower');
            $this->assertTrue( in_array( 'getOutputContent', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 
