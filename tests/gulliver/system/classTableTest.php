<?php 
  require_once PATH_TRUNK . 'gulliver/thirdparty/smarty/libs/Smarty.class.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlform.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.xmlDocument.php'; 
  require_once PATH_TRUNK . 'gulliver/system/class.table.php'; 

  /** 
   * Generated by ProcessMaker Test Unit Generator on 2012-05-10 at 20:39:58.
  */ 

  class classTableTest extends PHPUnit_Framework_TestCase 
  { 
    /**
    * @covers Table::Table
    * @todo   Implement testTable().
    */
    public function testTable() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'Table', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::SetTo
    * @todo   Implement testSetTo().
    */
    public function testSetTo() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'SetTo', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::SetSource
    * @todo   Implement testSetSource().
    */
    public function testSetSource() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'SetSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::GetSource
    * @todo   Implement testGetSource().
    */
    public function testGetSource() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'GetSource', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::TotalCount
    * @todo   Implement testTotalCount().
    */
    public function testTotalCount() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'TotalCount', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::Count
    * @todo   Implement testCount().
    */
    public function testCount() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'Count', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::CurRow
    * @todo   Implement testCurRow().
    */
    public function testCurRow() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'CurRow', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::ColumnCount
    * @todo   Implement testColumnCount().
    */
    public function testColumnCount() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'ColumnCount', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::Read
    * @todo   Implement testRead().
    */
    public function testRead() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'Read', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::Seek
    * @todo   Implement testSeek().
    */
    public function testSeek() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'Seek', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::MoveFirst
    * @todo   Implement testMoveFirst().
    */
    public function testMoveFirst() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'MoveFirst', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::EOF
    * @todo   Implement testEOF().
    */
    public function testEOF() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'EOF', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::AddColumn
    * @todo   Implement testAddColumn().
    */
    public function testAddColumn() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'AddColumn', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::AddRawColumn
    * @todo   Implement testAddRawColumn().
    */
    public function testAddRawColumn() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'AddRawColumn', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::RenderTitle
    * @todo   Implement testRenderTitle().
    */
    public function testRenderTitle() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'RenderTitle', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::RenderTitle_ajax
    * @todo   Implement testRenderTitle_ajax().
    */
    public function testRenderTitle_ajax() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'RenderTitle_ajax', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::RenderTitle2
    * @todo   Implement testRenderTitle2().
    */
    public function testRenderTitle2() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'RenderTitle2', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::RenderColumn
    * @todo   Implement testRenderColumn().
    */
    public function testRenderColumn() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'RenderColumn', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::SetAction
    * @todo   Implement testSetAction().
    */
    public function testSetAction() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'SetAction', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::setTranslate
    * @todo   Implement testsetTranslate().
    */
    public function testsetTranslate() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'setTranslate', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::translateValue
    * @todo   Implement testtranslateValue().
    */
    public function testtranslateValue() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'translateValue', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::setContext
    * @todo   Implement testsetContext().
    */
    public function testsetContext() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'setContext', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

    /**
    * @covers Table::ParsingFromHtml
    * @todo   Implement testParsingFromHtml().
    */
    public function testParsingFromHtml() 
    { 
        if (class_exists('Table')) {
             $methods = get_class_methods( 'Table');
            $this->assertTrue( in_array( 'ParsingFromHtml', $methods ), 'seems like this function is outside this class' ); 
        } 
    } 

  } 
