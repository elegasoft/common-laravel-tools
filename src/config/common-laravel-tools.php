<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Redirects Token Mismatch Exceptions
    |--------------------------------------------------------------------------
    |
    | If set to true Elegasoft's Common Tools Plugin will redirect
    | Illuminate\Session\TokenMismatchException Exceptions
    |
    */

    'tokenMismatchException'=>true,

    /*
    |--------------------------------------------------------------------------
    | Redirects HTTP Not Found Exceptions
    |--------------------------------------------------------------------------
    |
    | If set to true Elegasoft's Common Tools Plugin will redirect
    | Symfony\Component\HttpKernel\Exception\NotFoundHttpException Exceptions
    |
    */

    'missingRouteException'=>true,

    /*
    |--------------------------------------------------------------------------
    | Redirects HTTP Not Allowed Exceptions
    |--------------------------------------------------------------------------
    |
    | If set to true Elegasoft's Common Tools Plugin will redirect
    | Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException Exceptions
    |
    */

    'methodNotAllowedException'=>true,

    /*
    |--------------------------------------------------------------------------
    | Authorization Failed Exceptions
    |--------------------------------------------------------------------------
    |
    | If set to true Elegasoft's Common Tools Plugin will redirect
    | Illuminate\Auth\Access\AuthorizationException Exceptions
    |
    */

    'authorizationException'=>true,
];