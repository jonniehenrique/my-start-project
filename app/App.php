<?php

/* ALTERAR APP_URL A PARTIR DO AMBIENTE */

const APP_URL = 'http://localhost:8000/';

require_once 'Model.php';

function textLimit($text, $limit, $end) {
    $count = strlen($text);

    if ($count >= $limit):
        $text = substr($text, 0, strrpos(substr($text, 0, $limit), ' ')) . $end;
        return $text;
    else:
        return $text;
    endif;
}

function urlBase() {
    return APP_URL;
}

function urlPage($viewName) {
    return APP_URL . 'admin/painel?view=' . $viewName;
}

function showMessage($type, $message) {
    echo '<div class="alert-item alert-' . $type . '">' . $message . '</div>';
}

function maskString($string, $format) {
    $key = 0;
    $mask = '';

    for ($i = 0; $i <= strlen($format) - 1; $i++) {
        if ($format[$i] == '#'):
            if (isset($string[$key])):
                $mask .= $string[$key++];
            endif;
        else:
            if (isset($format[$i])):
                $mask .= $format[$i];
            endif;
        endif;
    }

    return $mask;
}

function numberOnly($string) {
    return preg_replace('/[^0-9]/', '', $string);
}

function stringToNumber($string) {
    return number_format($string, 2, ',', '.');
}

function dateFormatBr($data) {
    return date('d/m/Y', strtotime($data));
}

function validate(array $fields) {
    $validate = [];

    foreach ($fields as $field => $type) {
        switch ($type) {
            case 'str':
                $validate[$field] = filter_var($_POST[$field], FILTER_SANITIZE_STRING);
                break;

            case 'int':
                $validate[$field] = filter_var($_POST[$field], FILTER_SANITIZE_NUMBER_INT);
                break;

            case 'ema':
                $validate[$field] = filter_var($_POST[$field], FILTER_SANITIZE_EMAIL);
                break;
        }
    }

    return (object) $validate;
}

function redirect($view) {
    header('Location: ' . APP_URL . $view);
}