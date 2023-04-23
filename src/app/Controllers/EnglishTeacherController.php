<?php

namespace App\Controllers;

use App\Libraries\OpenAI_API_Client;

class EnglishTeacherController
{
    public function index()
    {

        $pageTitle = 'English Teacher';
        $pageCategory = 'AI Tools';
        $pageDescription = '<p>...</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = trim($_POST['message']);
            $prompt = "I want you to act as a spoken English teacher and improver. I will speak to you in English and you will reply to me in English to practice my spoken English. I want you to keep your reply short and neat, limiting the reply to 100 words. I want you to strictly correct my grammar mistakes, typos, and factual errors. I want you to ask me a question in your reply. Now let's start practicing, you could ask me a question first. Remember, I want you to strictly correct my grammar mistakes, typos, and factual errors.";
            ob_start();

            $OpenAI_API_Client = new OpenAI_API_Client(OPENAI_API_KEY);

            $data = array(
                "model" => "gpt-3.5-turbo",
                "messages" => array(
                    array("role" => "user", "content" => $prompt),
                    array("role" => "user", "content" => $message)
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

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/english_teacher.php');
    }
}