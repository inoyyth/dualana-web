<?php

namespace Tests\Unit\Infrastructure\Http;

use App\Infrastructure\Http\Exceptions\ApiException;
use App\Infrastructure\Http\LaravelRestClient;
use App\Infrastructure\Http\RestClientInterface;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class LaravelRestClientTest extends TestCase
{
    private LaravelRestClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new LaravelRestClient();
    }

    public function test_it_can_perform_get_requests_with_query_params(): void
    {
        Http::fake([
            'https://api.example.com/users*' => Http::response(['id' => 1, 'name' => 'John Doe'], 200, ['Content-Type' => 'application/json'])
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->get('/users', ['foo' => 'bar']);

        $this->assertTrue($response->successful());
        $this->assertEquals(200, $response->status());
        $this->assertEquals(['id' => 1, 'name' => 'John Doe'], $response->json());
        $this->assertEquals('John Doe', $response->json('name'));

        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.example.com/users?foo=bar' &&
                $request->method() === 'GET';
        });
    }

    public function test_it_can_perform_post_requests_with_payload(): void
    {
        Http::fake([
            'https://api.example.com/users' => Http::response(['status' => 'created'], 201)
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->post('/users', ['name' => 'Jane']);

        $this->assertEquals(201, $response->status());
        $this->assertEquals(['status' => 'created'], $response->json());

        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.example.com/users' &&
                $request->method() === 'POST' &&
                $request['name'] === 'Jane';
        });
    }

    public function test_it_can_perform_put_requests(): void
    {
        Http::fake([
            'https://api.example.com/users/1' => Http::response(['status' => 'updated'], 200)
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->put('/users/1', ['name' => 'Jane Updated']);

        $this->assertEquals(200, $response->status());

        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.example.com/users/1' &&
                $request->method() === 'PUT' &&
                $request['name'] === 'Jane Updated';
        });
    }

    public function test_it_can_perform_delete_requests(): void
    {
        Http::fake([
            'https://api.example.com/users/1' => Http::response(['status' => 'deleted'], 200)
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->delete('/users/1');

        $this->assertEquals(200, $response->status());

        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.example.com/users/1' &&
                $request->method() === 'DELETE';
        });
    }

    public function test_it_can_perform_patch_requests(): void
    {
        Http::fake([
            'https://api.example.com/users/1' => Http::response(['status' => 'patched'], 200)
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->patch('/users/1', ['status' => 'active']);

        $this->assertEquals(200, $response->status());

        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.example.com/users/1' &&
                $request->method() === 'PATCH' &&
                $request['status'] === 'active';
        });
    }

    public function test_it_sends_headers_and_auth_correctly(): void
    {
        Http::fake([
            'https://api.example.com/protected' => Http::response(['status' => 'authorized'], 200)
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->withHeaders(['X-Custom-Header' => 'value'])
            ->withToken('super-secret-token')
            ->get('/protected');

        $this->assertEquals(200, $response->status());

        Http::assertSent(function ($request) {
            return $request->hasHeader('X-Custom-Header', 'value') &&
                $request->hasHeader('Authorization', 'Bearer super-secret-token');
        });
    }

    public function test_it_sends_basic_auth_correctly(): void
    {
        Http::fake([
            'https://api.example.com/basic-auth' => Http::response(['status' => 'authorized'], 200)
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->withBasicAuth('user', 'pass')
            ->get('/basic-auth');

        $this->assertEquals(200, $response->status());

        Http::assertSent(function ($request) {
            return $request->hasHeader('Authorization', 'Basic ' . base64_encode('user:pass'));
        });
    }

    public function test_it_throws_custom_exception_on_failure(): void
    {
        Http::fake([
            'https://api.example.com/error' => Http::response('Something went wrong', 500)
        ]);

        $response = $this->client
            ->withBaseUrl('https://api.example.com')
            ->get('/error');

        $this->assertTrue($response->failed());
        $this->assertEquals(500, $response->status());

        $this->expectException(ApiException::class);
        $this->expectExceptionMessage('API request failed with status code 500');

        try {
            $response->throw();
        } catch (ApiException $e) {
            $this->assertEquals(500, $e->getStatusCode());
            $this->assertEquals('Something went wrong', $e->getResponseBody());
            $this->assertNotNull($e->getResponse());
            throw $e;
        }
    }

    public function test_the_client_configuration_is_immutable_clone_on_modify(): void
    {
        $baseClient = $this->client->withBaseUrl('https://api.example.com');
        $configuredClient = $baseClient->withHeaders(['X-Foo' => 'Bar']);

        $this->assertNotSame($baseClient, $configuredClient);

        Http::fake(['*' => Http::response('ok')]);

        $baseClient->get('/test');
        Http::assertSent(function ($request) {
            return !$request->hasHeader('X-Foo');
        });

        $configuredClient->get('/test');
        Http::assertSent(function ($request) {
            return $request->hasHeader('X-Foo', 'Bar');
        });
    }

    public function test_it_can_be_resolved_from_service_container(): void
    {
        $resolved = app(RestClientInterface::class);
        $this->assertInstanceOf(LaravelRestClient::class, $resolved);
    }
}
