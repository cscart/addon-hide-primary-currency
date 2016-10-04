<?php

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_hide_primary_currency_init_currency_post(&$params, &$area, &$primary_currency, &$secondary_currency)
{
    if ($area == 'A') {
        $admin_code = Registry::get('addons.hide_primary_currency.admin_code');

        if (array_key_exists('currency', $params)) {
            $secondary_currency = Tygh::$app['session']['currency'] = $params['currency'];
        } elseif (Tygh::$app['session']['currency']) {
            $secondary_currency = Tygh::$app['session']['currency'];
        } else {
            $secondary_currency = $admin_code;
        }

        if ($params['dispatch'] == 'addons.update') {
            $secondary_currency = $admin_code;
            unset(Tygh::$app['session']['currency']);
        }
    } else {
        $secondary_currency = Registry::get('addons.hide_primary_currency.storefront_code');
    }
}

function fn_hide_primary_currency_init_templater_post(&$view)
{
    $view->assign('hide_currencies', true);
    $view->assign('currencies', Registry::get('currencies'), false);
}
