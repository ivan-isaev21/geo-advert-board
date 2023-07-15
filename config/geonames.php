<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Seeders
    |--------------------------------------------------------------------------
    |
    | List of seeders that will be used to populate and update the database.
    | They will run one after the other so the order is important.
    |
    */

    'seeders' => [

        \Database\Seeders\Geo\ContinentSeeder::class,
        \Database\Seeders\Geo\ContinentTranslationSeeder::class,
        \Database\Seeders\Geo\CountrySeeder::class,
        \Database\Seeders\Geo\CountryTranslationSeeder::class,
        \Database\Seeders\Geo\DivisionSeeder::class,
        \Database\Seeders\Geo\DivisionTranslationSeeder::class,
        \Database\Seeders\Geo\CitySeeder::class,
        \Database\Seeders\Geo\CityTranslationSeeder::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Translations
    |--------------------------------------------------------------------------
    |
    | Translations are powered by the "nevadskiy/laravel-translatable" package.
    |
    */

    'translations' => [

        /*
         * The list of locales for which translations should be seeded.
         * 'en', 'es', 'fr', 'de', 'it', 'pt', 'pl', 'uk', 'ru', 'ja', 'zh', 'hi', 'ar'
         */

        'locales' => ['en', 'uk', 'ru'],

        /*
         * Indicates if translations with a nullable locale should be seeded.
         * These type of translations can be useful for searching but take up more space.
         */
        'nullable_locale' => true,

    ],

    /*
    |--------------------------------------------------------------------------
    | Geonames downloads directory
    |--------------------------------------------------------------------------
    |
    | A temporary directory for geonames meta files and downloads.
    | It can be added to the .gitignore file.
    |
    */

    'directory' => storage_path('tmp'),

];
