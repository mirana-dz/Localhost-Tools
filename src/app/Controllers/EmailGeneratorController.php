<?php

namespace App\Controllers;

use App\Libraries\OpenAI_API_Client;

class EmailGeneratorController
{
    public function index(): void
    {

        $pageTitle = 'Email Generator';
        $pageCategory = 'AI Tools';
        $pageDescription = '<p>...</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/email_generator.php');
            return;
        }

        $sender = trim($_POST['sender'] ?? '');
        $recipient = trim($_POST['recipient'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $topic = trim($_POST['topic'] ?? '');
        $tone = trim($_POST['tone'] ?? '');

        if (empty($sender) || empty($recipient) || empty($subject) || empty($topic) || empty($tone)) {
            echo 'Invalid input.';
            return;
        }
        $prompt = 'From: ' . $sender . '\nTo: ' . $recipient . '\nSubject: ' . $subject . '\nTopic: ' . $topic . '\nTone: ' . $tone;

        $OpenAI_API_Client = new OpenAI_API_Client(OPENAI_API_KEY);

        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => array(
                array("role" => "user", "content" => $prompt)
            )
        );

        $data_string = json_encode($data);

        // the JSON response from ChatGPT
        $json_response = $OpenAI_API_Client->createChatCompletion($data_string);

        // decode the JSON response into an associative array
        $response_data = json_decode($json_response, true);

        // extract the completed text from the response
        $completed_text = $response_data['choices'][0]['message']['content'];

        // print the completed text
        echo trim($completed_text);
    }
}