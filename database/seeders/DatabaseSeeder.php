<?php

use App\Character;
use App\Comic;
use App\Serie;
use App\Storie;
use App\Event;
use App\Url;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = Character::factory()->count(100)->create(); 

        foreach($characters as $character){
            Comic::factory()->count(5)->create([ 'character_id' => $character->getId() ]); 
        }
        foreach($characters as $character){
            Serie::factory()->count(4)->create([ 'character_id' => $character->getId() ]); 
        }  
        foreach($characters as $character){
            Storie::factory()->count(5)->create([ 'character_id' => $character->getId() ]); 
        }
        foreach($characters as $character){
            Event::factory()->count(3)->create([ 'character_id' => $character->getId() ]); 
        }  
        foreach($characters as $character){
            Url::factory()->count(2)->create([ 'character_id' => $character->getId() ]); 
        }               
    }
}
