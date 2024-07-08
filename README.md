<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## USED LARAVEL 11
## Stage 01

PHP REST API FOR ORDER CREATION : http://127.0.0.1:8000/api/new_order
AFTER THE ORDER CREATION IS SUCCESS, THEN IT WILL CALL THIRD PARTY API (POST) TO SUBMIT THE DATA ON THE SAME.

## Stage 02
3. Suggest a method to queue the API requests into the server

For effectively queue and process high-demand API requests, suggesting laravel's queue system with Redis and managing the workers with supervisor.

4. Simple web form which store values in browser-based “Indexed DB”.

http://127.0.0.1:8000/order

