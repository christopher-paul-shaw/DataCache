<?php
namespace App\Test;
use CPS\DataCache;
use PHPUnit\Framework\TestCase;

class DataCacheTest extends TestCase {

	public function setUp () {}

	public function testICanCacheData () {
		$data = "hello world test data";
		$datacache = new DataCache('test','/tmp/');
		$datacache->write($data);
		$cached = $datacache->read();
		$this->assertEquals($data, $cached);
		unlink("/tmp/DataCache-test.dat");
	}

	public function testICantLoadTimedOut () {
		$data = "hello world test data";
		$datacache = new DataCache('test2','/tmp/',0);
		$datacache->write($data);
		$cached = $datacache->read();
		$this->assertFalse($cached);
	}
	
}
