<?php

function is_active($route, $active = 'active') {

    if (is_array($route)) {
        foreach ($route as $r) {
            if (Request::is($r)) {
                return $active;
            };
        }

        return '';
    }

    return Request::is($route)? $active : '';
};
