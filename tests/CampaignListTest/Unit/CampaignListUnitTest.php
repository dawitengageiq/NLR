<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Campaign;
class CampaignListUnitTest extends TestCase
{
	/**
	 * @test
	 *
	 */
    public function getCampaigns()
    {
    	$stub = $this->getMockBuilder(CampaignList::class)
    			->setmethods(array('getCampaigns'))
    			->getMock();
    			$stub->expects($this->once())
    				->method('getCampaigns')
    				->will($this->returnValue(false));
    				$stub->getCampaigns();
        $this->assertTrue(true);
    }

}
