<?php

namespace App\Infrastructure\Http;

interface RestClientInterface
{
    /**
     * Set base URL for the client.
     *
     * @param string $baseUrl
     * @return self
     */
    public function withBaseUrl(string $baseUrl): self;

    /**
     * Set request headers.
     *
     * @param array<string, string> $headers
     * @return self
     */
    public function withHeaders(array $headers): self;

    /**
     * Set a bearer token or custom authentication token.
     *
     * @param string $token
     * @param string $type
     * @return self
     */
    public function withToken(string $token, string $type = 'Bearer'): self;

    /**
     * Set basic authentication.
     *
     * @param string $username
     * @param string $password
     * @return self
     */
    public function withBasicAuth(string $username, string $password): self;

    /**
     * Set request timeout in seconds.
     *
     * @param int $seconds
     * @return self
     */
    public function withTimeout(int $seconds): self;

    /**
     * Perform a GET request.
     *
     * @param string $url
     * @param array<string, mixed> $query
     * @return ApiResponse
     */
    public function get(string $url, array $query = []): ApiResponse;

    /**
     * Perform a POST request.
     *
     * @param string $url
     * @param array<string, mixed> $data
     * @return ApiResponse
     */
    public function post(string $url, array $data = []): ApiResponse;

    /**
     * Perform a PUT request.
     *
     * @param string $url
     * @param array<string, mixed> $data
     * @return ApiResponse
     */
    public function put(string $url, array $data = []): ApiResponse;

    /**
     * Perform a DELETE request.
     *
     * @param string $url
     * @param array<string, mixed> $data
     * @return ApiResponse
     */
    public function delete(string $url, array $data = []): ApiResponse;

    /**
     * Perform a PATCH request.
     *
     * @param string $url
     * @param array<string, mixed> $data
     * @return ApiResponse
     */
    public function patch(string $url, array $data = []): ApiResponse;
}
