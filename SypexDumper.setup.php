<?php
/* ====================
[BEGIN_COT_EXT]
Code=SypexDumper
Name=Sypex Dumper
Category=utilities-tools
Description="Sypex Dumper" - бэкап и восстановление БД MySQL
Version=1.1
Date=2019-08-18
Author=Dr2005alex
Copyright=Copyright (c) 2015 Cotonti team 
Notes=Используем готовый продукт от http://sypex.net/ Данная версия поддерживает PHP 7.0 и выше, а также сохраняет работоспособность с версиями ниже 7.0
Auth_guests=R1
Lock_guests=W2345A
Auth_members=RW1
Lock_members=2345
Recommends_modules=
Recommends_plugins=
Requires_modules=
Requires_plugins=
[END_COT_EXT]
[BEGIN_COT_EXT_CONFIG]
unique=1:string:::Имя уникальной папки для хранения дампов
[END_COT_EXT_CONFIG]
==================== */

/**
 * Sypex Dumper for Cotonti CMF
 *
 * @version 1.1 
 * @author Dr2005alex, http://mycotonti.ru
 * @copyright (c) 20015 Dr2005alex, http://mycotonti.ru
 */

defined('COT_CODE') or die('Wrong URL.');