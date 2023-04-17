<?php

namespace App\Vendor;

class OpenAIEndpoints
{
    const URL_LIST_MODELS = 'https://api.openai.com/v1/models';
    const URL_RETRIEVE_MODEL = 'https://api.openai.com/v1/models/';
    const URL_COMPLETIONS = 'https://api.openai.com/v1/completions';
    const URL_CHAT_COMPLETION = 'https://api.openai.com/v1/chat/completions';
    const URL_EDITS = 'https://api.openai.com/v1/chat/completions';
    const URL_CREATE_IMAGE = 'https://api.openai.com/v1/images/generations';
    const URL_CREATE_IMAGE_EDIT = 'https://api.openai.com/v1/images/edits';
    const URL_CREATE_IMAGE_VARIATION = 'https://api.openai.com/v1/images/variations';

    /* TODO
     const URL_COMPLETION = 'https://api.openai.com/v1/completions';
     const URL_CREATE_TRANSCRIPTION = 'https://api.openai.com/v1/audio/transcriptions';
     const URL_CREATE_TRANSLATION = 'https://api.openai.com/v1/audio/translations';
     const URL_FINE_TUNE = 'https://api.openai.com/v1/fine-tunes';
     const LIST_FINE_TUNE_EVENTS = 'events';
     */
}