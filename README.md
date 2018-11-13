# LogRhythm
A tool for storing log information in MySQL DB with some necessary information.

#### Information that stored by this package:

- User ID
- User IP
- User Input (Optional)
- URL
- HTTP Method
- Log Level
- Log Message
- Stack Trace (Optional) 
- Request Referrer/Origin


## Contents

- [Installation](#installation)
- [License](#License)


## Installation

1. To install *LogRhythm*, run the following command:

    ```shell
    composer require infancyit/log-rhythm
    ```

2. For Laravel version > 5.5 'ServiceProvider' will be automatically added.

3. Run the command below to load all configuration file: 

    ```shell
    php artisan vendor:publish --provider="InfancyIt\LogRhythm\LogRhythmServiceProvider"
    ```

4. After publishing update your configuration to choose this package for logging. To change the logging channel to LogRhythm add `logrhythm` in the channels array on `config/logging.php`:
   
   ```php
   protected $channels = [
           ... ... ... ... ...
           ... ... ... ... ...
        'logrhythm' => [
            'driver' => 'custom',
            'via' => \InfancyIt\LogRhythm\LogRhythmChannel::class,
        ],
     
       ];

5. Run the command below to migrate database table: 

    ```shell
    php artisan migrate
    ```
6. Update your `.env` ( If you cache your `env` then clear cache to load new settings by `php artisan config:cache`):
   
   ```php
   LOG_CHANNEL=logrhythm
   ```
7. You can control the logging information by updating `config/logrhythm.php` file.


## License

LogRhythm is free software distributed under the terms of the MIT license.
