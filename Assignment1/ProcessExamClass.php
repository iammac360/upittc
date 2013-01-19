<?php
class ProcessExam {
	private $answers = array(
			'multipleChoice' => array('b', 'd', 'd', 'd'),
			'fillInTheBlanks' => array('iOS', 'array', 'recursion', 'JavaScript Object Notation'),
			'multipleGuess' => array(
					array('a', 'c', 'd'),
					array('a', 'b', 'c'),
					array('a', 'c'),
					array('c', 'e')
				)
		);
	
	/**
	 * @return 	mixed
	 * @param 	int $part
	 * @param 	int $qnum
	 */
	public function getAnswers($part, $qnum)
	{
		if($part == 1) return $this->answers['multipleChoice'][$qnum-1];
		if($part == 2) return $this->answers['fillInTheBlanks'][$qnum-1];
		if($part == 3) return $this->answers['multipleGuess'][$qnum-1 ];
	}

	/**
	 * @return 	boolean
	 * @param 	char $var
	 * @param 	char $ans
	 */
	public function checkAnswers($post, $ans)
	{
		if($post === $ans) return true;
		return false;
	}
}