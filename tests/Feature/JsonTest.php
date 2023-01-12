<?php

namespace Tests\Feature;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
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
        $user= Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );
        $response= $this->post("/api/customer", ["id"=>1])->getContent();
        dd($response);
      
    }
   
}
