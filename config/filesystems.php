<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

        'estaciones' => [
            'driver' => 'local',
            'root' => storage_path('app/public/abonos'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'facturas_pdf' => [
            'driver' => 'local',
            'root' => storage_path('app/public/facturas_pdf'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'facturas_pdf_2' => [
            'driver' => 'local',
            'root' => storage_path('app/public/facturas_pdf_2'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'facturas_xml' => [
            'driver' => 'local',
            'root' => storage_path('app/public/facturas_xml'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'facturas_xml_2' => [
            'driver' => 'local',
            'root' => storage_path('app/public/facturas_xml_2'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'bill_payment' => [
            'driver' => 'local',
            'root' => storage_path('app/public/bill_payment'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'order_payment' => [
            'driver' => 'local',
            'root' => storage_path('app/public/order_payments'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],


    ],

];
