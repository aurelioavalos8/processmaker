<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:56.
  */ 

  class classXmlForm_Field_PrintTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers XmlForm_Field_Print::render
    * @todo   Implement testrender().
    */
    public function testrender() 
    { 
        if (class_exists('XmlForm_Field_Print')) {
             $methods = get_class_methods( 'XmlForm_Field_Print');
            $this->assertTrue( in_array( 'render', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 
