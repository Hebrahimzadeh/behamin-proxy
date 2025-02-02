<?php

namespace Behamin\ServiceProxy\Tests\Feature;

use Behamin\ServiceProxy\Proxy;
use Behamin\ServiceProxy\Tests\TestCase;


class ProxyMockTest extends TestCase
{
    private string $jsonPathBackStepUpFromLaravel = '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.
    '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.
    'tests'.DIRECTORY_SEPARATOR.'mock'.DIRECTORY_SEPARATOR.'test.json';

    private string $jsonPath = __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.
    'tests'.DIRECTORY_SEPARATOR.'mock'.DIRECTORY_SEPARATOR.'test.json';

    private string $jsonPathBackStepUp2FromLaravel = '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.
    '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.
    'tests'.DIRECTORY_SEPARATOR.'mock'.DIRECTORY_SEPARATOR.'test2.json';

    private string $jsonPath2 = __DIR__ . DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.
    'tests'.DIRECTORY_SEPARATOR.'mock'.DIRECTORY_SEPARATOR.'test2.json';

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testMockIsWorking(): void
    {
        $response = Proxy::mock($this->jsonPathBackStepUpFromLaravel)->get('test');
        $jsonFile = file_get_contents($this->jsonPath);
        $json = json_decode($jsonFile, true, 512, JSON_THROW_ON_ERROR);
        $this->assertEquals($response->json(), $json);
    }

    public function testMultiMocksAreWorking(): void
    {
        $response = Proxy::mock($this->jsonPathBackStepUpFromLaravel)->get('test');
        $jsonFile = file_get_contents($this->jsonPath);
        $json = json_decode($jsonFile, true, 512, JSON_THROW_ON_ERROR);
        $this->assertEquals($response->json(), $json);

        $response = Proxy::mock($this->jsonPathBackStepUp2FromLaravel)->get('test2');
        $jsonFile = file_get_contents($this->jsonPath2);
        $json = json_decode($jsonFile, true, 512, JSON_THROW_ON_ERROR);
        $this->assertEquals($response->json(), $json);
    }
}
