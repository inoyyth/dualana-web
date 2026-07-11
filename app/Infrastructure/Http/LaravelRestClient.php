<?php

namespace App\Infrastructure\Http;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LaravelRestClient implements RestClientInterface
{
    protected string $baseUrl = '';
    protected array $headers = [];
    protected ?array $token = null;
    protected ?array $basicAuth = null;
    protected int $timeout = 30;

    public function withBaseUrl(string $baseUrl): self
    {
        $clone = clone $this;
        $clone->baseUrl = $baseUrl;
        return $clone;
    }

    public function withHeaders(array $headers): self
    {
        $clone = clone $this;
        $clone->headers = array_merge($clone->headers, $headers);
        return $clone;
    }

    public function withToken(string $token, string $type = 'Bearer'): self
    {
        $clone = clone $this;
        $clone->token = ['token' => $token, 'type' => $type];
        return $clone;
    }

    public function withBasicAuth(string $username, string $password): self
    {
        $clone = clone $this;
        $clone->basicAuth = ['username' => $username, 'password' => $password];
        return $clone;
    }

    public function withTimeout(int $seconds): self
    {
        $clone = clone $this;
        $clone->timeout = $seconds;
        return $clone;
    }

    /**
     * Build the Laravel HTTP request template.
     *
     * @return PendingRequest
     */
    protected function buildRequest(): PendingRequest
    {
        $request = Http::timeout($this->timeout);

        if (!empty($this->baseUrl)) {
            $request->baseUrl($this->baseUrl);
        }

        if (!empty($this->headers)) {
            $request->withHeaders($this->headers);
        }

        if ($this->token !== null) {
            $request->withToken($this->token['token'], $this->token['type']);
        }

        if ($this->basicAuth !== null) {
            $request->withBasicAuth($this->basicAuth['username'], $this->basicAuth['password']);
        }

        return $request;
    }

    public function get(string $url, array $query = []): ApiResponse
    {
        $response = $this->buildRequest()->get($url, $query);
        return new ApiResponse($response);
    }

    public function post(string $url, array $data = []): ApiResponse
    {
        $response = $this->buildRequest()->post($url, $data);
        return new ApiResponse($response);
    }

    public function put(string $url, array $data = []): ApiResponse
    {
        $response = $this->buildRequest()->put($url, $data);
        return new ApiResponse($response);
    }

    public function delete(string $url, array $data = []): ApiResponse
    {
        $response = $this->buildRequest()->delete($url, $data);
        return new ApiResponse($response);
    }

    public function patch(string $url, array $data = []): ApiResponse
    {
        $response = $this->buildRequest()->patch($url, $data);
        return new ApiResponse($response);
    }
}
