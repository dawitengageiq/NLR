<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Services\Leads\LeadStore;
use App\Http\Services\SendLeadsValidator;

class LeadRepositoryTest extends TestCase
{
	use SendLeadsTrait;
	private $leadStore;
	private $leadRepository;
	private $SUT;
    private $validator;
    private $rules = [];
    private $responseData = [];

    public function __construct()
    {
        $this->getLeadsForValidator();
        $this->validator = new SendLeadsValidator;
    }
	public function setUp()
	{
		parent::setUp();
	}
	
    /**
	 * @test
	 * 
	 */
    public function save_leads_to_leads_table_if_not_duplicate()
    {
        $response = new stdClass;
        $response->id = 1;
    	$leadRepository = $this->getMockBuilder('App\Helpers\Repositories\LeadRepository')
    					->setMethods(array('leadCreate'))
                        ->disableOriginalClone()
                        ->disableArgumentCloning()
    					->getMock();
    					$leadRepository->expects($this->once())
    					->method('leadCreate')
    					->will($this->returnValue($response->id));
    					$leadRepository->leadCreate($this->results,1,2);
        $this->assertInternalType('object',$leadRepository); 
    }  
}
