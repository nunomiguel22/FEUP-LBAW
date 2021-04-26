#!/bin/bash

php artisan optimize
php artisan route:cache
php artisan view:clear
php artisan config:cache