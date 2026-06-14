<?php

namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;

class NsptService
{
    private $baseUrl;
    private $apiPath = '/api/v1';
    private $token;
    private $client;

    public function __construct()
    {
        $this->baseUrl = getenv('NSPT_API_URL');
        $this->token = getenv('NSPT_API_TOKEN');
        $this->client = new CURLRequest(
            new \Config\Services\Curlrequest(),
            []
        );
    }

    /**
     * Generate NSS baru untuk lembaga
     * 
     * @param int $lembagaId ID Lembaga di NSPT
     * @return object Response dari API
     */
    public function generateNss($lembagaId)
    {
        try {
            $url = $this->baseUrl . $this->apiPath . '/lembaga/' . $lembagaId . '/generate-nss';

            $response = $this->client->request('POST', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ],
                'http_errors' => false
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody());

            return (object) [
                'success' => $statusCode === 200,
                'status' => $statusCode,
                'data' => $body->data ?? null,
                'message' => $body->message ?? 'Terjadi kesalahan saat generate NSS',
                'raw_response' => $body
            ];
        } catch (\Exception $e) {
            return (object) [
                'success' => false,
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage(),
                'raw_response' => null
            ];
        }
    }

    /**
     * Get detail NSS history lembaga
     * 
     * @param int $lembagaId ID Lembaga di NSPT
     * @return object Response dari API
     */
    public function getNssHistory($lembagaId)
    {
        try {
            $url = $this->baseUrl . $this->apiPath . '/lembaga/' . $lembagaId . '/nss-log';

            $response = $this->client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Accept' => 'application/json'
                ],
                'http_errors' => false
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody());

            return (object) [
                'success' => $statusCode === 200,
                'status' => $statusCode,
                'data' => $body->data ?? null,
                'message' => $body->message ?? 'Terjadi kesalahan saat mengambil history NSS',
                'raw_response' => $body
            ];
        } catch (\Exception $e) {
            return (object) [
                'success' => false,
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage(),
                'raw_response' => null
            ];
        }
    }

    /**
     * Get detail lembaga dari NSPT
     * 
     * @param int $lembagaId ID Lembaga di NSPT
     * @return object Response dari API
     */
    public function getLembagaDetail($lembagaId)
    {
        try {
            $url = $this->baseUrl . $this->apiPath . '/lembaga/' . $lembagaId;

            $response = $this->client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Accept' => 'application/json'
                ],
                'http_errors' => false
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody());

            return (object) [
                'success' => $statusCode === 200,
                'status' => $statusCode,
                'data' => $body->data ?? null,
                'message' => $body->message ?? 'Terjadi kesalahan saat mengambil detail lembaga',
                'raw_response' => $body
            ];
        } catch (\Exception $e) {
            return (object) [
                'success' => false,
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage(),
                'raw_response' => null
            ];
        }
    }

    /**
     * Create or update lembaga di NSPT
     * 
     * @param array $data Data lembaga sesuai LembagaPayload schema
     * @param int $lembagaId Optional - jika ada, maka update. Jika tidak ada, maka create
     * @return object Response dari API
     */
    public function saveLembaga($data, $lembagaId = null)
    {
        try {
            if ($lembagaId) {
                // UPDATE
                $url = $this->baseUrl . $this->apiPath . '/lembaga/' . $lembagaId;
                $method = 'PUT';
            } else {
                // CREATE
                $url = $this->baseUrl . $this->apiPath . '/lembaga';
                $method = 'POST';
            }

            $response = $this->client->request($method, $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->token,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ],
                'json' => $data,
                'http_errors' => false
            ]);

            $statusCode = $response->getStatusCode();
            $body = json_decode($response->getBody());

            return (object) [
                'success' => $statusCode === 200 || $statusCode === 201,
                'status' => $statusCode,
                'data' => $body->data ?? null,
                'message' => $body->message ?? 'Terjadi kesalahan saat menyimpan data lembaga',
                'raw_response' => $body
            ];
        } catch (\Exception $e) {
            return (object) [
                'success' => false,
                'status' => 500,
                'data' => null,
                'message' => $e->getMessage(),
                'raw_response' => null
            ];
        }
    }
}
