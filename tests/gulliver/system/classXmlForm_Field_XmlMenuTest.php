<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlMenu.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:55.
  */ 

  class classXmlForm_Field_XmlMenuTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers XmlForm_Field_XmlMenu::XmlForm_Field_XmlMenu
    * @todo   Implement testXmlForm_Field_XmlMenu().
    */
    public function testXmlForm_Field_XmlMenu() 
    { 
        if (class_exists('XmlForm_Field_XmlMenu')) {
             $methods = get_class_methods( 'XmlForm_Field_XmlMenu');
            $this->assertTrue( in_array( 'XmlForm_Field_XmlMenu', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers XmlForm_Field_XmlMenu::render
    * @todo   Implement testrender().
    */
    public function testrender() 
    { 
        if (class_exists('XmlForm_Field_XmlMenu')) {
             $methods = get_class_methods( 'XmlForm_Field_XmlMenu');
            $this->assertTrue( in_array( 'render', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers XmlForm_Field_XmlMenu::renderGrid
    * @todo   Implement testrenderGrid().
    */
    public function testrenderGrid() 
    { 
        if (class_exists('XmlForm_Field_XmlMenu')) {
             $methods = get_class_methods( 'XmlForm_Field_XmlMenu');
            $this->assertTrue( in_array( 'renderGrid', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 
