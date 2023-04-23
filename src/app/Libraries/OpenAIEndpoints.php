<?php
/**
 * Class OpenAIEndpoints
 * This class defines constants that represent the endpoints for the OpenAI API.
 */

namespace App\Libraries;

class OpenAIEndpoints
{
    /**
     * Endpoint for retrieving a list of available models
     * @var string
     */
    const URL_LIST_MODELS = 'https://api.openai.com/v1/models';
    /**
     * Endpoint for retrieving information about a specific model
     * @var string
     */
    const URL_RETRIEVE_MODEL = 'https://api.openai.com/v1/models/';
    /**
     * Endpoint for text completion
     * @var string
     */
    const URL_COMPLETIONS = 'https://api.openai.com/v1/completions';
    /**
     * Endpoint for completing a conversation turn
     * @var string
     */
    const URL_CHAT_COMPLETION = 'https://api.openai.com/v1/chat/completions';
    /**
     * Endpoint for editing the completion of a conversation turn
     * @var string
     */
    const URL_EDITS = 'https://api.openai.com/v1/chat/completions';
    /**
     * Endpoint for generating an image
     * @var string
     */
    const URL_CREATE_IMAGE = 'https://api.openai.com/v1/images/generations';
    /**
     * Endpoint for editing an image
     * @var string
     */
    const URL_CREATE_IMAGE_EDIT = 'https://api.openai.com/v1/images/edits';
    /**
     * Endpoint for generating a variation of an image
     * @var string
     */
    const URL_CREATE_IMAGE_VARIATION = 'https://api.openai.com/v1/images/variations';

    /* 
     * Endpoint for completing a prompt
     * @var string
     */
    const URL_COMPLETION = 'https://api.openai.com/v1/completions';

    /* 
    * Endpoint for creating a transcription
    * @var string
    */
    const URL_CREATE_TRANSCRIPTION = 'https://api.openai.com/v1/audio/transcriptions';

    /* 
     * Endpoint for creating a translation
     * @var string
     */
    const URL_CREATE_TRANSLATION = 'https://api.openai.com/v1/audio/translations';
    /* 
    * Endpoint for fine-tuning a model
    * @var string
    */
    const URL_FINE_TUNE = 'https://api.openai.com/v1/fine-tunes';
    /* 
    * Endpoint for listing fine-tune events
    * @var string
    */
    const LIST_FINE_TUNE_EVENTS = 'events';

}