<?php

use PHPUnit\Framework\TestCase;
use Wead\DigitalCep\Search;

class SearchTest extends TestCase {

  /**
   * @dataProvider dadosTeste
   */
  public function testGetAddressFromZipCodeDefaultUsage(string $input, array $esperado) {
    $resultado = new Search;
    $resultado = $resultado->getAddressFromZipCode($input);

    $this->assertEquals( $resultado, $esperado );
  }

  public function dadosTeste(){
    return [
      "Endereço Praça da Sé" => [
        "01001000",
        [
          'cep' => '01001-000',
          'logradouro' => 'Praça da Sé',
          'complemento' => 'lado ímpar',
          'bairro' => 'Sé',
          'localidade' => 'São Paulo',
          'uf' => 'SP',
          'ibge' => '3550308',
          'gia' => '1004',
          'ddd' => '11',
          'siafi' => '7107'
        ]
      ],
      "Endereço Casa" => [
        "95315000",
        [
          'cep' => '95315-000',
          'logradouro' => '',
          'complemento' => '',
          'bairro' => '',
          'localidade' => 'Caseiros',
          'uf' => 'RS',
          'ibge' => '4304952',
          'gia' => '',
          'ddd' => '54',
          'siafi' => '8441'
        ]
      ]
    ];
  }

}