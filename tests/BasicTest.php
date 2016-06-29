<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicTest extends TestCase
{
    public function testDashboard()
    {
        $this->visit('/')
            ->see('Job board');
    }

    public function testIsRedirected(){
        $this->visit('/')
            ->click('Add a new job')
            ->seePageIs('/job/create');
    }

    public function testAddingNewJob()
    {
        $this->visit('/job/create')
            ->type('denisv16@gmail.com', 'email')
            ->type('Laravel developer', 'title')
            ->type('Lorem ipsum dolor sit amet','description')
            ->type('PHP, Laravel, VueJS, MYSQL', 'skills')
            ->check('remote')
            ->press('Save it')
            ->seePageIs('/job');
    }

    public function testSearching(){
        $this->visit('/')
            ->type('php', 'query')
            ->press('Search')
            ->seePageIs('/search?query=php');
    }
}
