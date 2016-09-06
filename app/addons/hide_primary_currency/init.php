<?php

if (!defined('BOOTSTRAP')) { die('Access denied'); }

fn_register_hooks(
    'init_currency_post',
    'init_templater_post'
);
