<?php

namespace Luis\CepApi;

use Luis\CepApi\ws\ViaCep;

class Search
{
    public function getAdressFromZipcode(string $zipcode): array
    {
        $zipCode = preg_replace('/[^0-9]/im', '', $zipcode);

        return $this->getFromServer($zipCode);
    }

    private function getFromServer(string $zipCode): array
    {
        $get = new ViaCep();

        return $get->get($zipCode);
    }

    private function processData($data)
    {
        foreach ($data as $k => $v) {
            $data[$k] = trim($v);
        }

        return $data;
    }
}
