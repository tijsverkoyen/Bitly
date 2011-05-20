<?php

// require the class
require_once '../bitly.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * test case.
 */
class BitlyTest extends PHPUnit_Framework_TestCase
{

	private $bitly;


	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp()
	{
		parent::setUp();

		$login = 'tijsverkoyen';
		$apiKey = 'R_5c4643c1b6a0c367d4e19d4a110d60c2';

		// create instance
		$this->bitly = new Bitly($login, $apiKey);

	}


	public function testShorten()
	{
		$response = $this->bitly->shorten('http://blog.verkoyen.eu');

		$this->assertArrayHasKey('url', $response);
		$this->assertArrayHasKey('long_url', $response);
		$this->assertArrayHasKey('hash', $response);
		$this->assertArrayHasKey('global_hash', $response);
		$this->assertArrayHasKey('is_new_hash', $response);
	}


	public function testClicks()
	{
		$response = $this->bitly->clicks('http://bit.ly/aHA6Dx');

		$this->assertArrayHasKey('url', $response);
		$this->assertArrayHasKey('hash', $response);
		$this->assertArrayHasKey('clicks', $response);
		$this->assertArrayHasKey('global_hash', $response);
		$this->assertArrayHasKey('global_clicks', $response);
	}


	public function testExpand()
	{
		$response = $this->bitly->expand('http://bit.ly/aHA6Dx');

		$this->assertArrayHasKey('url', $response);
		$this->assertArrayHasKey('long_url', $response);
		$this->assertArrayHasKey('hash', $response);
		$this->assertArrayHasKey('global_hash', $response);
	}


	public function testValidate()
	{
		$login = 'tijsverkoyen';
		$apiKey = 'R_5c4643c1b6a0c367d4e19d4a110d60c2';

		$response = $this->bitly->validate($login, $apiKey);

		$this->assertTrue($response);
	}


	public function testIsProDomain()
	{
		$response = $this->bitly->isProDomain('ntl.sh');

		$this->assertTrue($response);
	}

}

