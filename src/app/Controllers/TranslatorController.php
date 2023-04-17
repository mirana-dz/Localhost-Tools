<?php
//Translate "${text}" from ${source} to ${target}:
namespace App\Controllers;

use App\Vendor\OpenAI_API_Client;

class TranslatorController
{
    public function index()
    {

        $pageTitle = 'Translator';
        $pageCategory = 'AI Tools';
        $pageDescription = '<p>...</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            $source = trim($_POST['language-from']);
            $target = trim($_POST['language-to']);
            $prompt = "Translate [$input] from $source to $target";
            ob_start();

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

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/translator.php');
    }
}