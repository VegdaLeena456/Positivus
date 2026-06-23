<?php

namespace App\Services;

class AIService
{
    /**
     * Create a new class instance.
     */
    private string $model;

    public function __construct()
    {
        $this->model = 'gpt-4o-mini';
    }

    public function ask(string $userPrmopt, string $systemPrompt = '') : string
    {

    $message = [];

    if($systemPrompt){
        $message[] =  ['role' => 'system', 'content' => $systemPrompt];
    }

    $message[] = ['role' => 'user', 'content' => $userPrompt];

    // $response = Gemini


    }
}
