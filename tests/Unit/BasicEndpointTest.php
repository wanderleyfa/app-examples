<?php

uses(Tests\TestCase::class);

test('existe o endpoint que retorna string')->get("/retornaString/123")->assertStatus(200);
test('existe o endpoint que retorna inteiro')->get("/retornaInteiro/123")->assertStatus(200);
test('não existe o endpoint')->get("/esseEndpointNaoExiste")->assertStatus(404);

test('comparando retorno de um endpoint json', function () {

    $response = $this->getJson("/retornaString/123");

    $data = [
        'type' => 'string',
        'value' => '123',
    ];

    $response->assertStatus(200)->assertJson($data);

});

test('comparando retorno de um endpoint json com tipo definido de parametro', function () {

    $response = $this->getJson("/retornaInteiro/123");

    $data = [
        'type' => 'integer',
        'value' => 123,
    ];

    $response->assertStatus(200)->assertJson($data);

});


test('verificando retorno inteiro', function () {
    $response = json_encode($this->get("/retornaInteiro/123"));

    expect(($response))
    ->json()
    ->baseResponse->original->toHaveCount(2)
    ->baseResponse->original->type->toBe('integer')
    ->baseResponse->original->value->toBe(123)
    ;

});



test('verificando retorno nao inteiro', function () {
    $response = json_encode($this->get("/retornaString/123"));

    expect(($response))
    ->json()
    ->baseResponse->original->toHaveCount(2)
    ->baseResponse->original->type->not->toBe('integer')
    ->baseResponse->original->value->not->toBe(123)
    ;

});