<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Services\Leads\LeadStore;
use App\Http\Services\SendLeadsValidator;

class StoreLeadsTest extends TestCase
{
    //use DatabaseMigrations;
	use SendLeadsTrait;
	private $leadStore;
	private $leadRepository;
	private $SUT;
    private $validator;
    private $rules = [];
    private $responseData = [];

    public function __construct()
    {
       
        $this->validator = new SendLeadsValidator;
        $this->getLeadsForValidator();
    }
	public function setUp()
	{
		parent::setUp();
		$this->leadRepository = $this->getMock('App\Helpers\Repositories\LeadInterface');
	 	$this->leadData = $this->getMock('App\Helpers\Repositories\LeadData');
		$this->SUT = new LeadStore($this->leadData,$this->leadRepository);
	}
    /**
     * @test
     * @expectedException Exception
     */
    public function check_if_leadCreate_method_is_called_when_calling_proceedtosave_method()
    {
        $leadData = $this->getMock('App\Helpers\Repositories\LeadData');        
        $leadIn = $this->getMockbuilder('App\Helpers\Repositories\LeadInterface')
                    ->setMethods(array('leadCreate'))
                    ->getMock();
        $leadIn->expects($this->any())
                ->method('leadCreate')
                ->will($this->returnValue(1));
                $leadIn->leadCreate($this->results,1,2);
        $re =$this->SUT->proceedtosave($this->results,1,2);
    }
    /**
     * test
     */
    public function check_save_lead_csv_data()
    {

    }
}
