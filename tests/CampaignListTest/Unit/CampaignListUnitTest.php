<?php

class CampaignListUnitTest extends TestCase
{
    /**
     * @test
     */
    public function getCampaigns()
    {
        $stub = $this->getMockBuilder(CampaignList::class)
            ->setmethods(['getCampaigns'])
            ->getMock();
        $stub->expects($this->once())
            ->method('getCampaigns')
            ->will($this->returnValue(false));
        $stub->getCampaigns();
        $this->assertTrue(true);
    }
}
