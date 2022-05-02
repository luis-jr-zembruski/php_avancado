<?php

namespace Luis\CepApi;

class Search
{
    private $url = 'https://viacep.com.br/ws/';

    public function getAdressFromZipcode(string $zipcode): array
    {
        $zipCode = preg_replace('/[^0-9]/im', '', $zipcode);

        $get = $this->getFromServer($zipCode);

        return (array) json_decode($get);
    }

    private function getFromServer($zipCode)
    {
        $get = file_get_contents($this->url . $zipCode . '/json/');

        return $get;
    }

    private function processData($data)
    {
        foreach ($data as $k => $v) {
            $data[$k] = trim($v);
        }

        return $data;
    }
}
