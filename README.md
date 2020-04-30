## Trial Test Actual Sales

This project was developed with Laravel, Docker, and Vessel as a command line shortcut to run Docker commands easier.

To install the project, it's necessary to install the packages through Composer, and run the migrations and seed to create and populate the database. Using Vessel, please do the following:

```
cp .env.example .env
./vessel start
./vessel comp install
./vessel art key:generate
./vessel art migrate:fresh --seed
```

If you prefer to use another development enviroment, just replace the "./vessel" to the usual commands, like 

```
composer install
php artisan key:generate
php artisan migrate:fresh --seed
```

In case of disconfigured layout, please run 

```
./vessel yarn
./vessel yarn install
```
Or execute them without "./vessel", in case of using another development enviroment


To run the import CSV command, please run

```
./vessel art import:clientsdeals {pathToTheFile}
```
or 

```
php artisan import:clientsdeals {pathToTheFile}
```

At "public" path, the example file sent is placed, so, the command would be:

```
./vessel art import:clientsdeals public/TRIAL_CSV.csv
```




