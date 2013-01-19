<?php

require_once 'ProcessExamClass.php';

class ProcessExamTest extends PHPUnit_Framework_TestCase {

	public $test;

	public function setUp()
	{
		$this->test = new ProcessExam();
	}

	
	public function testAnswers()
	{
		$this->assertTrue($this->test->getAnswers(1, 1) === 'b');
		$this->assertTrue($this->test->getAnswers(1, 2) === 'd');
		$this->assertTrue($this->test->getAnswers(1, 3) === 'd');
		$this->assertTrue($this->test->getAnswers(1, 4) === 'd');
	}

	public function testCheckAnswers()
	{
		$this->assertTrue($this->test->checkAnswers('b', $this->test->getAnswers(1, 1)));
		$this->assertTrue($this->test->checkAnswers('d', $this->test->getAnswers(1, 2)));
		$this->assertTrue($this->test->checkAnswers('d', $this->test->getAnswers(1, 3)));
		$this->assertTrue($this->test->checkAnswers('d', $this->test->getAnswers(1, 4)));
	}
}