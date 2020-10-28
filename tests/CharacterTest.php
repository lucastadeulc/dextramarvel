<?php

class CharacterTest extends TestCase
{
    const character_expected_format = [
        'data',
    ];

    /**
     * /characters [GET] 200
     */
    public function testShouldReturnAllCharacters(){
        $this->get("v1/public/characters", []);
        $this->seeStatusCode(200);
    }

    /**
     * /characters/id [GET] 200
     */
    public function testShouldReturnCharacter(){
        $this->get("v1/public/characters/2", []);
        $this->seeStatusCode(200);
    }

    /**
     * /characters/id [GET] 404
     */
    public function testShouldNotReturnCharacter(){
        $this->get("v1/public/characters/2999999", []);
        $this->seeStatusCode(404);
        $this->seeJsonEquals([
            'error' => "We couldn't find that character",
        ]); 
    }

    /**
     * /characters/id/comics [GET] 200
     */
    public function testShouldReturnCharacterComics(){
        $this->get("v1/public/characters/2/comics", []);
        $this->seeStatusCode(200);
    }

    /**
     * /characters/id/comics [GET] 404
     */
    public function testShouldNotReturnCharacterComics(){
        $this->get("v1/public/characters/2/comicss", []);
        $this->seeStatusCode(404);
        $this->seeJsonEquals([
           'error' => 'ResourceNotFound',
        ]);        
    }

    /**
     * /characters/id/comics [GET] 404
     */
    public function testShouldNotFindCharacterWithValidComics(){
        $this->get("v1/public/characters/29999999/comics", []);
        $this->seeStatusCode(404);
        $this->seeJsonEquals([
            'error' => "We couldn't find that character",
        ]);        
    }

}