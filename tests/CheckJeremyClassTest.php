<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class CheckJeremyClassTest extends TestCase
{
    public function testFailure()
    {
        // $this->assertClassHasAttribute('setData', 'App\Http\Services\Charts');
         $this->assertTrue(
          method_exists('App\Http\Services\Charts', 'setData'), 
          'Class does not have method myFunction'
        );
    }
    //this test passed

    public function testConcreteMethod()
    {
        $stub = $this->getMockForAbstractClass('App\Http\Services\Factories\ChartFactory');
       
        $actual_rejection = [
            'high' => [],
            'critical' => []
        ];
        $stub->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(True));

        $this->assertTrue($stub->concreteMethod());

        //this test fails
    }
}
