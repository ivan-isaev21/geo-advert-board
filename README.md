# Geo Advert Board

## Installl

1. Run command `git clone <path to remote repositiry>` geo-advert-board
2. Run command `cd geo-advert-board`
3. Run command `cp .env.example .env`
4. Change credentials in `.env` file if you need
5. Run command `docker-compose build`
6. Run command `docker-compose up -d`
7. Run command `docker exec -it geo-advert-board bash`
8. Run command `composer install`
9. Run command `php artisan migrate`
10. Run command `php artisan geonames:seed`
11. Run command `exit`
12. Run command `sudo chmod -R 777 storage`
13. Run command `sudo chmod -R 777 bootstrap/cache/`

## Updating

1. Run command `cd geo-advert-board`
2. Run command `git pull`
3. Run command `docker exec -it geo-advert-board bash`
4. Run command `composer install` if you need
5. Run command `php artisan migrate`
6. Run command `queue:restart` to restart current queue workers after code updating

## Running The Scheduler

You can add command `*/1 * * * *  docker exec -it geo-advert-board bash -c "php artisan schedule:work >> cronjob.log"` to cron
## Syncing

If you missed some daily updates or just decided to change seeder filters, you can sync your database records according to the current geonames dataset.

`php artisan geonames:sync`
This command will create missing records, remove redundant ones, and updated modified ones according to the current dataset.

Note that the geoname_id and alternate_name_id fields is required to synchronize data.
