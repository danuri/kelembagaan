<?php

namespace App\Libraries;

use Config\Services;

class SipproService
{
    protected $client;
    protected $baseUrl;
    protected $key;

    public function __construct()
    {
        $this->baseUrl = getenv('SIPPRO_API_URL') ?: 'https://prodi.kemenag.go.id/api/v1';
        $this->key = getenv('SIPPRO_API_KEY');

        $this->client = Services::curlrequest([
            'baseURI' => $this->baseUrl . '/',
            'headers' => [
                'X-API-Key' => $this->key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'http_errors' => false,
            'timeout' => 30 // Set a reasonable timeout
        ]);
    }

    /**
     * Mengirimkan data pengajuan prodi baru ke SIPPRO
     *
     * @param array $data Data payload untuk prodi baru
     * @return object Response berisikan status, success, dan data/message
     */
    public function kirimProdiBaru(array $data)
    {
        try {
            $response = $this->client->post('prodi-baru', [
                'json' => $data
            ]);

            return $this->parseResponse($response);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Mengirimkan data pengajuan perubahan bentuk lembaga ke SIPPRO
     *
     * @param array $data Data payload untuk perubahan bentuk
     * @return object Response berisikan status, success, dan data/message
     */
    public function kirimPerubahanBentuk(array $data)
    {
        try {
            $response = $this->client->post('perubahan-bentuk', [
                'json' => $data
            ]);

            return $this->parseResponse($response);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Cek status pengajuan ke SIPPRO
     *
     * @param string $id
     * @return object Response berisikan status, success, dan data/message
     */
    public function cekStatus(string $id)
    {
        try {
            $response = $this->client->get('status/' . $id);

            return $this->parseResponse($response);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Parsing response dari API
     *
     * @param \CodeIgniter\HTTP\ResponseInterface $response
     * @return object
     */
    protected function parseResponse($response)
    {
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();
        $decoded = json_decode($body, true);

        return (object) [
            'status' => $statusCode,
            'success' => $statusCode >= 200 && $statusCode < 300,
            'data' => $decoded !== null ? $decoded : $body
        ];
    }

    /**
     * Format exception handling
     *
     * @param \Exception $e
     * @return object
     */
    protected function handleException(\Exception $e)
    {
        // Log the error if necessary
        log_message('error', '[SipproService] API Request Failed: ' . $e->getMessage());

        return (object) [
            'status' => 500,
            'success' => false,
            'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
        ];
    }
}
