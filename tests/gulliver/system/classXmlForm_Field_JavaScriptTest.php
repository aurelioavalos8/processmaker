<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:57.
  */ 

  class classXmlForm_Field_JavaScriptTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers XmlForm_Field_JavaScript::XmlForm_Field_JavaScript
    * @todo   Implement testXmlForm_Field_JavaScript().
    */
    public function testXmlForm_Field_JavaScript() 
    { 
        if (class_exists('XmlForm_Field_JavaScript')) {
             $methods = get_class_methods( 'XmlForm_Field_JavaScript');
            $this->assertTrue( in_array( 'XmlForm_Field_JavaScript', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers XmlForm_Field_JavaScript::render
    * @todo   Implement testrender().
    */
    public function testrender() 
    { 
        if (class_exists('XmlForm_Field_JavaScript')) {
             $methods = get_class_methods( 'XmlForm_Field_JavaScript');
            $this->assertTrue( in_array( 'render', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers XmlForm_Field_JavaScript::renderGrid
    * @todo   Implement testrenderGrid().
    */
    public function testrenderGrid() 
    { 
        if (class_exists('XmlForm_Field_JavaScript')) {
             $methods = get_class_methods( 'XmlForm_Field_JavaScript');
            $this->assertTrue( in_array( 'renderGrid', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers XmlForm_Field_JavaScript::validateValue
    * @todo   Implement testvalidateValue().
    */
    public function testvalidateValue() 
    { 
        if (class_exists('XmlForm_Field_JavaScript')) {
             $methods = get_class_methods( 'XmlForm_Field_JavaScript');
            $this->assertTrue( in_array( 'validateValue', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 
