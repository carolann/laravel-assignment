<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class CustomerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /*
        Test customer loan route
    */
    public function test_customer_web(){
        // Test getting customer data from browser
        $response = $this->get('/customer/1');
        $response->assertStatus(200);
    }
    /*
        Test customer loan api route
    */
    public function test_customer_api(){
        // Test getting api customer query data
        $response= $this->get("/api/customer/1");
        $response->assertStatus(200);
    }
    /*
        Test customer api error route
    */
    public function test_customer_api_error(){
        // Test generating an error
        $response= $this->get("/api/customer/400");
        $response->assertStatus(404);
      
    }

   
}
