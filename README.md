# Livewire Charts demo

Sample application on how to use [`asantibanez/livewire-charts`](https://github.com/asantibanez/livewire-charts). Enjoy!

![preview](https://github.com/asantibanez/livewire-charts-demo/raw/master/preview.png)

## Installation

Firstly clone the repository to your machine.

Next install dependancies.

```
composer update
```

Next create your .env file and add the APP_KEY

```
cp .env.example .env
php artisan key:generate
```

Create your database, run the migration and seed it with some dummy data

```
php artisan migrate:fresh --seed
```

Enjoy! 💪
