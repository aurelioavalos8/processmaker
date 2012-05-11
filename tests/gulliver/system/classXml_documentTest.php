<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:58.
  */ 

  class classXml_documentTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers Xml_document::Xml_document
    * @todo   Implement testXml_document().
    */
    public function testXml_document() 
    { 
        if (class_exists('Xml_document')) {
             $methods = get_class_methods( 'Xml_document');
            $this->assertTrue( in_array( 'Xml_document', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Xml_document::parseXmlFile
    * @todo   Implement testparseXmlFile().
    */
    public function testparseXmlFile() 
    { 
        if (class_exists('Xml_document')) {
             $methods = get_class_methods( 'Xml_document');
            $this->assertTrue( in_array( 'parseXmlFile', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Xml_document::findNode
    * @todo   Implement testfindNode().
    */
    public function testfindNode() 
    { 
        if (class_exists('Xml_document')) {
             $methods = get_class_methods( 'Xml_document');
            $this->assertTrue( in_array( 'findNode', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Xml_document::getXML
    * @todo   Implement testgetXML().
    */
    public function testgetXML() 
    { 
        if (class_exists('Xml_document')) {
             $methods = get_class_methods( 'Xml_document');
            $this->assertTrue( in_array( 'getXML', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Xml_document::save
    * @todo   Implement testsave().
    */
    public function testsave() 
    { 
        if (class_exists('Xml_document')) {
             $methods = get_class_methods( 'Xml_document');
            $this->assertTrue( in_array( 'save', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 
