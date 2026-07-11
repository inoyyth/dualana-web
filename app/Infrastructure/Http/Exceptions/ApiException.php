<?php

namespace App\Infrastructure\Http\Exceptions;

use Exception;
use Illuminate\Http\Client\Response as LaravelResponse;

class ApiException extends Exception
{
    private string $responseBody;
    private ?LaravelResponse $response;

    public function __construct(
        string $message,
        int $statusCode = 0,
        string $responseBody = '',
        ?LaravelResponse $response = null,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $statusCode, $previous);
        $this->responseBody = $responseBody;
        $this->response = $response;
    }

    /**
     * Get the HTTP status code of the failed request.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->code;
    }

    /**
     * Get the raw HTTP response body.
     *
     * @return string
     */
    public function getResponseBody(): string
    {
        return $this->responseBody;
    }

    /**
     * Get the underlying Laravel HTTP client response, if available.
     *
     * @return LaravelResponse|null
     */
    public function getResponse(): ?LaravelResponse
    {
        return $this->response;
    }
}
