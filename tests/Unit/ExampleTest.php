<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    public function testLogin()
    {
    	if (session()->has('login')) {
    		return view('logado');
    	}
    	
    }

    public function testePostUser()
    {
    	$this->post('/users',[
    		'name' => 'Teste Insert',
    		'email' => 'insert55@gmail.com',
    		'tipo'  => '2',
    		'password' => bcrypt('123456')
    		]);
    }
}
