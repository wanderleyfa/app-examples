<?php

use Illuminate\Support\Facades\Route;

Route::get('/retornaString/{valor}', function ($valor) {
    return response()->json([
        'type' => gettype($valor),
        'value' => $valor,
    ]);
});

Route::get('/retornaInteiro/{valor}', function (int $valor) {
    return response()->json( [
        'type' => gettype($valor),
        'value' => $valor,
    ]);
});
