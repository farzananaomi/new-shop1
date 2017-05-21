<?php

function sanitize($val, $default = '') {

    return empty($val)? $default : $val;
}