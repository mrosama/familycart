<?php

use App\Setting;

function str_replace_me($slug) {
    return trim(str_replace(' ', '_', $slug));
}

function site_name() {
    return Setting::first()->site_name;
}
