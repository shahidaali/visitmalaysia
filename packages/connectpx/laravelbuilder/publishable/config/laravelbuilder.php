<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Scripts
    |--------------------------------------------------------------------------
    |
    | Here you can specify builder default scripts
    |
    */

    'scripts' => [
        'laravelbuilder/keditor/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js',
        'laravelbuilder/keditor/plugins/ckeditor-4.11.4/ckeditor.js',
        'laravelbuilder/keditor/dist/js/keditor.js',
        'laravelbuilder/keditor/dist/js/keditor-components.js',
        'laravelbuilder/keditor/plugins/js-beautify-1.7.5/js/lib/beautify-html.js',
        'laravelbuilder/keditor/config.js'
    ],
    'styles' => [
        'laravelbuilder/keditor/plugins/bootstrap-3.4.1/css/bootstrap.min.css',
        'laravelbuilder/keditor/plugins/font-awesome-4.7.0/css/font-awesome.min.css',
        'laravelbuilder/keditor/dist/css/keditor.css',
        'laravelbuilder/keditor/dist/css/keditor-components.css',
        'laravelbuilder/keditor/custom.css'
    ],

    'controllers' => [
        'namespace' => 'Connectpx\\LaravelBuilder\\Http\\Controllers',
    ],

    'sinippets' => [
        'default' => [
            'sinippet-col-1',
            'sinippet-col-2-33-67',
            'sinippet-col-2-50-50',
            'sinippet-col-2-67-33',
            'sinippet-col-3-25-50-35',
            'sinippet-col-3-33-33-33',
            'sinippet-col-4-25-25-25-25',
            'sinippet-col-3-articles',
            'sinippet-col-2-featured',
            'sinippet-text-block',
            'sinippet-heading-1',
            'sinippet-heading-2',
            'sinippet-page-header',
            'sinippet-image',
            'sinippet-media-panel',
            'sinippet-thumbnail-panel',
            'sinippet-jumbotron',
            'sinippet-dynamic-content',
            'sinippet-google-map',
            'sinippet-audio',
            'sinippet-bootstrap-form',
            'sinippet-video',
            'sinippet-vimeo',
            'sinippet-youtube',
        ],
        'extra' => [
            
        ],
    ],
];
