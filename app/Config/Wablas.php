<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Wablas extends BaseConfig
{
    public $apiUrl = 'https://kudus.wablas.com/api/v2/send-message';
    public $token = 'YOUR_TOKEN_DI_WABLAS';  // dari device settings Wablas
    // Jika butuh secret_key / serial key, bisa ditambahkan
}
