<?php
require_once '../PKColor.php';

class PKColorTest extends PHPUnit_Framework_TestCase {
    
    protected $obj;
    
    private $granularity = '20';
    private $imageName = 'images';
    private $colorsCount = '4';
    
    protected function setUp() {
        $this->obj = new PKColor();
        $this->obj->setGranularity($this->granularity)
                  ->setPicture($this->imageName)
                  ->setColorsCount($this->colorsCount);
    }
    
    protected function tearDown() {
    }
    
    public function testGetValues() {
        $this->setName('Degerler dogru setlenmis mi');
        
        $this->assertEquals(array($this->imageName, $this->granularity, $this->colorsCount), $this->obj->getValues());
    }
    
    /**
     * @dataProvider provider
     */
    public function testGetIt($ext) {
        
        $this->setName('Resim dogru islenmis mi');
        
        $expectedValues = array('FF0000', '000000', '993333', 'FF0033');
        
        $this->assertEquals($expectedValues, $this->obj->getIt($this->imageName . $ext));
        
    }
    
    public function provider() {
        return array(
            array('.png', '.gif', '.jpg')
        );
    }
}
