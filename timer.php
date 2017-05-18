<?php

class myTimer
{
	private $start_time;
	private $stop_time;

	function __construct( $elapsed = 5 ){
		$this->stop_time = time() + $elapsed;
	}

	public function set_time($elapsed){
		$this->stop_time = time() + $elapsed;
	}


	public function start(){
		if( $this->stop_time === 0 ) $this->set_time(5);
		
		while( time() <= $this->stop_time ){
			//do nothing
		}

		$this->stop_time = 0;
	}
}
