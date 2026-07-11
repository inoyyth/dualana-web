<?php

namespace App\Infrastructure\Http;

use App\Infrastructure\Http\Exceptions\ApiException;
use Illuminate\Http\Client\Response as LaravelResponse;

class ApiResponse
{
    public function __construct(private readonly LaravelResponse $response)
    {
    }

    /**
     * Get the HTTP status code of the response.
     *
     * @return int
     */
    public function status(): int
    {
        return $this->response->status();
    }

    /**
     * Get the body of the response.
     *
     * @return string
     */
    public function body(): string
    {
        return $this->response->body();
    }

    /**
     * Get the JSON decoded body of the response.
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public function json(?string $key = null, mixed $default = null): mixed
    {
        return $this->response->json($key, $default);
    }

    /**
     * Get the response headers.
     *
     * @return array
     */
    public function headers(): array
    {
        return $this->response->headers();
    }

    /**
     * Check if the request was successful.
     *
     * @return bool
     */
    public function successful(): bool
    {
        return $this->response->successful();
    }

    /**
     * Check if the request failed.
     *
     * @return bool
     */
    public function failed(): bool
    {
        return $this->response->failed();
    }

    /**
     * Throw an exception if the response was an HTTP error.
     *
     * @return self
     * @throws ApiException
     */
    public function throw(): self
    {
        if ($this->failed()) {
            throw new ApiException(
                "API request failed with status code " . $this->status(),
                $this->status(),
                $this->body(),
                $this->response
            );
        }

        return $this;
    }
}
