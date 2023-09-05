<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => 'local',

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

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'ftp' => [
            'driver' => 'ftp',
            'host' => 'ftp.example.com',
            'username' => 'your-username',
            'password' => 'your-password',

            // Optional FTP Settings...
            // 'port'     => 21,
            // 'root'     => '',
            // 'passive'  => true,
            // 'ssl'      => true,
            // 'timeout'  => 30,
        ],

        // touch mark corp ftp
        'touch_mark_corp_ftp' => [
            'driver' => 'ftp',
            'host' => env('TOUCHMARK_FTP_HOST', 'sftp.touchmarkcorp.com'),
            'username' => env('TOUCHMARK_FTP_USERNAME', 'engageiq_iq'),
            'password' => env('TOUCHMARK_FTP_PASSWORD', '7SE3=Fb+'),
            'passive' => false,
            'root' => '/',
        ],

        'ftp_test' => [
            'driver' => 'ftp',
            'host' => 'paidforresearch.com',
            'username' => 'ftpusertest',
            'password' => 'mr@kwa38479',
            'passive' => false,
            'root' => '/',
            // Optional FTP Settings...
            // 'port'     => 21,
            // 'root'     => '',
            // 'ssl'      => true,
            // 'timeout'  => 30,
        ],

        'ftp_feeds' => [
            'driver' => 'local',
            'root' => storage_path('ftp_feeds'),
        ],

        's3' => [
            'driver' => 's3',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
        ],

        'rackspace' => [
            'driver' => 'rackspace',
            'username' => 'your-username',
            'key' => 'your-key',
            'container' => 'your-container',
            'endpoint' => 'https://identity.api.rackspacecloud.com/v2.0/',
            'region' => 'IAD',
            'url_type' => 'publicURL',
        ],

        'public' => [
            'driver' => 'local',
            'root' => public_path(),
        ],

        'downloads' => [
            'driver' => 'local',
            'root' => storage_path('downloads'),
        ],

        'reports' => [
            'driver' => 'sftp',
            'host' => env('REPORTS_FTP_HOST', 'nlr.engageiq.com'),
            'username' => env('REPORTS_FTP_USERNAME', 'USERNAME'),
            'password' => env('REPORTS_FTP_PASSWORD', 'PASSWORD'),
            'port' => env('REPORTS_FTP_PORT', '21'),
            'passive' => false,
            'root' => env('REPORTS_FTP_DIR', '/var/www/html/tlr.engageiq.com/storage/downloads'),
        ],

        'main' => [
            'driver' => 'sftp',
            'host' => env('MAIN_FTP_HOST', 'nlr.engageiq.com'),
            'username' => env('MAIN_FTP_USERNAME', 'USERNAME'),
            'password' => env('MAIN_FTP_PASSWORD', 'PASSWORD'),
            'port' => env('MAIN_FTP_PORT', '21'),
            'passive' => false,
            'root' => env('MAIN_FTP_DIR', '/var/www/html/devleadreactor.engageiq.com/storage/downloads'),
        ],

        'main_slave' => [
            'driver' => 'sftp',
            'host' => env('MAIN_SLAVE_FTP_HOST', 'nlr.engageiq.com'),
            'username' => env('MAIN_SLAVE_FTP_USERNAME', 'USERNAME'),
            'password' => env('MAIN_SLAVE_FTP_PASSWORD', 'PASSWORD'),
            'port' => env('MAIN_SLAVE_FTP_PORT', '21'),
            'passive' => false,
            'root' => env('MAIN_SLAVE_FTP_DIR', '/var/www/html/devleadreactor.engageiq.com/storage/downloads'),
        ],
    ],

];
