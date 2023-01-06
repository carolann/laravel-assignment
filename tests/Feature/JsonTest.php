<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class JsonTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /*
        View api json output
    */ 
    public function test_customer_api_seejson(){
        // Test getting api customer query data
        $response= $this->get("/api/customer/1")->getContent();
        dd($response);
      
    }
   
}
