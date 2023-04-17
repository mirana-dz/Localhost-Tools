<?php
// TODO
//https://platform.openai.com/docs/api-reference/completions/create	

namespace App\Vendor;

//require_once 'OpenAIEndpoints.php';

class OpenAI_API_Client
{
    private array $httpHeader;

    /**
     * OpenAI_API_Client constructor.
     *
     * @param string $OPENAI_API_KEY The API key to use for authentication with the OpenAI API.
     * @return void
     */
    public function __construct($OPENAI_API_KEY)
    {
        $this->httpHeader = ["Content-Type: application/json", "Authorization: Bearer $OPENAI_API_KEY"];
    }

    public function setHttpHeader($parameters)
    {
        $this->httpHeader = $parameters;
    }

    /*
    Models:
    List and describe the various models available in the API. You can refer to the Models documentation to understand
    what models are available and the differences between them.
    */
    public function getListModels()
    {
        $url = OpenAIEndpoints::URL_LIST_MODELS;
        return $this->httpGet($url); //get https://api.openai.com/v1/models	
    }

    private function httpGet($url)
    {
        $curl = curl_init();

        if (!$curl) {
            die("Couldn't initialize a cURL handle");
        }

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => $this->httpHeader,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    /*
    Completions:
    Given a prompt, the model will return one or more predicted completions, and can also return the probabilities
    of alternative tokens at each position.
    */

    public function getRetrieveModels($model)
    {
        $url = OpenAIEndpoints::URL_RETRIEVE_MODEL . $model;
        return $this->httpGet($url);//get https://api.openai.com/v1/models/{model}
    }

    /*
    Chat:
    Given a chat conversation, the model will return a chat completion response.
    */

    public function createCompletion($parameters)
    {
        $url = OpenAIEndpoints::URL_COMPLETIONS;
        // $parameters = json_encode($parameters);
        return $this->httpPost($url, $parameters);//post https://api.openai.com/v1/completions
    }


    /*
    Edits:
    Given a prompt and an instruction, the model will return an edited version of the prompt.
    */

//Create edit
//post https://api.openai.com/v1/edits


//Create image
//post https://api.openai.com/v1/images/generations


//Create image edit
//post https://api.openai.com/v1/images/edits


//Create image variation
//post https://api.openai.com/v1/images/variations

    private function httpPost($url, $parameters)
    {
        $curl = curl_init();

        if (!$curl) {
            die("Couldn't initialize a cURL handle");
        }
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $parameters,
            // CURLOPT_POSTFIELDS => "{\n    \"model\": \"text-davinci-003\",\n    \"prompt\": \"Say this is a test\",\n    \"max_tokens\": 7,\n    \"temperature\": 0\n } ",
            CURLOPT_HTTPHEADER => $this->httpHeader,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }


    }

    public function createChatCompletion($parameters)
    {
        $url = OpenAIEndpoints::URL_CHAT_COMPLETION;
        return $this->httpPost($url, $parameters); //post https://api.openai.com/v1/chat/completions
    }


}
