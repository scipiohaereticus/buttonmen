<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-29 at 13:10:57.
 */
class BMHitTableTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var BMHitTable
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $die1 = BMDie::create(6);
        $die1->value = 2;
        $die2 = BMDie::create(10);
        $die2->value = 8;
        $die3 = BMDie::create(16);
        $die3->value = 1;
        $die4 = BMDie::create(20);
        $die4->value = 18;

        $this->object = new BMHitTable(array($die1, $die2, $die3, $die4));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers BMHitTable::find_hit
     * @todo   Implement testFind_hit().
     */
    public function testFind_hit()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMHitTable::list_hits
     * @todo   Implement testList_hits().
     */
    public function testList_hits()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
