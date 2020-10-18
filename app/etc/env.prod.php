<?php
return [
    'backend' => [
        'frontName' => 'admin'
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => 'eb663453815c844369e8e2d6d8946e70'
    ],
    'db' => [
        'table_prefix' => 'm2_',
        'connection' => [
            'default' => [
                'host' => 'mysql',
                'dbname' => 'elena_zabolotnaya_local',
                'username' => 'elena_zabolotnaya_local',
                'password' => 'elena_zabolotnaya_local',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'cache' => [
        'frontend' => [
            'default' => [
                'id_prefix' => '69d_'
            ],
            'page_cache' => [
                'id_prefix' => '69d_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'lock' => [
        'provider' => 'db',
        'config' => [
            'prefix' => null
        ]
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1,
        'vertex' => 1
    ],
    'downloadable_domains' => [
        'elena-zabolotnaya.local'
    ],
    'install' => [
        'date' => 'Sun, 11 Oct 2020 09:16:20 +0000'
    ],
    'system' => [
        'default' => [
            'web' => [
                'unsecure' => [
                    'base_url' => 'https://elena-zabolotnaya.local/',
                    'base_link_url' => '{{unsecure_base_url}}',
                    'base_static_url' => 'https://elena-zabolotnaya.local/static/',
                    'base_media_url' => 'https://elena-zabolotnaya.local/media/'
                ],
                'secure' => [
                    'base_url' => 'https://elena-zabolotnaya.local/',
                    'base_link_url' => '{{secure_base_url}}',
                    'base_static_url' => 'https://elena-zabolotnaya.local/static/',
                    'base_media_url' => 'https://elena-zabolotnaya.local/media/'
                ],
            ],
        ],
        'websites' => [
            'additional_website' => [
                'web' => [
                    'unsecure' => [
                        'base_url' => 'https://elena-zabolotnaya-additional.local/',
                        'base_link_url' => 'https://elena-zabolotnaya-additional.local/',
                        'base_static_url' => 'https://elena-zabolotnaya-additional.local/static/',
                        'base_media_url' => 'https://elena-zabolotnaya-additional.local/media/'
                    ],
                    'secure' => [
                        'base_url' => 'https://elena-zabolotnaya-additional.local/',
                        'base_link_url' => 'https://elena-zabolotnaya-additional.local/',
                        'base_static_url' => 'https://elena-zabolotnaya-additional.local/static/',
                        'base_media_url' => 'https://elena-zabolotnaya-additional.local/media/'
                    ]
                ]
            ]
        ]
    ]
];
