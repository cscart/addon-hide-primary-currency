<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_hide_primary_currency_init_currency_post(&$params, &$area, &$primary_currency, &$secondary_currency) {
    $primary_currency = 'DESIRED_ADMIN_CURRENCY_CODE';
    $secondary_currency = 'DESIRED_ADMIN_CURRENCY_CODE';
}

function fn_hide_primary_currency_init_templater_post(&$view) {
    $view->assign('hide_currencies', true);
    $view->assign('currencies', Registry::get('currencies'), false);
}