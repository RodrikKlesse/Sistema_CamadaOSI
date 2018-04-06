<?php
class Fisica 
{
	private $devices;

	public function __construct()
	{
		$this->set_devices();
	}

	public function get_devices()
	{
		return $this->devices;
	}

	private function set_devices()
	{
		$this->devices = $this->server_devices();
	}

	private function server_devices()
	{
		$result - null;

		$exec = shell_exec("ipconfig");
		$adapters = explode("Ethernet", $exec);

		foreach($adapters as $adapter)
		{
			$search = substr($adapter, 0, strpos($adapter, ":"));
			if($search)
			{
				$result .= $search . '<br />';
			}
		}

		return $result;
	}
}

