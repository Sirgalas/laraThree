<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvoicesTest extends TestCase
{
    /** @test */

    public function customer_can_see_a_form_for_creating_new_invoice(){
        $user= factory(User::class)->create();
        $this->get('invoices/new')->assertStatus(200)
        ->assertSee('Create new Invoice');
    }
}
