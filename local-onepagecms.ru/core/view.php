<?php class View 
{

	protected static $g_data = array();
        
     
	protected $_file;

	
	protected $_data = array();

	
	public static function factory($file = NULL, array $data = NULL)
	{
		return new View($file, $data);
	}


	protected static function capture($filename, array $data)
	{
		
		extract($data, EXTR_SKIP);

		if (View::$g_data)
		{
			
			extract(View::$g_data, EXTR_REFS);
		}

		
		ob_start();

		try
		{
			
			include $filename;
		}
		catch (Exception $e)
		{
			
			ob_end_clean();

			
			throw $e;
		}

		
		return ob_get_clean();
	}


	public static function set_global($key, $value = NULL)
	{
		if (is_array($key))
		{
			foreach ($key as $key2 => $value)
			{
				View::$g_data[$key2] = $value;
			}
		}
		else
		{
			View::$g_data[$key] = $value;
		}
	}

    public static function getALLglobals()
	{
            return View::$g_data;
	}

	
	public static function bind_global($key, & $value)
	{
		View::$g_data[$key] =& $value;
	}

	

	private function __construct($file = NULL, array $data = NULL)
	{
		if ($file !== NULL)
		{
			$this->set_filename($file);
		}

		if ( $data !== NULL)
		{
			
			$this->_data = $data + $this->_data;
		}
	}

	public function & __get($key)
	{
		if (isset($this->_data[$key]))
		{
			return $this->_data[$key];
		}
		elseif (isset(View::$g_data[$key]))
		{
			return View::$g_data[$key];
		}
		else
		{
			throw new Exception('View variable is not set: {$key}');
				 
		}
	}

	public function __set($key, $value)
	{
		$this->set($key, $value);
	}

	public function __isset($key)
	{
		return (isset($this->_data[$key]) OR isset(View::$g_data[$key]));
	}

	public function __unset($key)
	{
		unset($this->_data[$key], View::$g_data[$key]);
	}

	public function __toString()
	{
		try
		{
		   return $this->render();
		}
		catch (Exception $e)
		{
                    echo $e->getMessage();
		}
	}

	
	private function set_filename($pathName)
	{
                
                $path = MODDIR . DS . $pathName . '.php' ; 
		// Store the file path locally
		$this->_file = $path;

		return $this;
	}

	 

	public function render($file = NULL)
	{
		if ($file !== NULL)
		{
			$this->set_filename($file);
		}

		if (empty($this->_file))
		{
			throw new Exception('You must set the file to use within your view before rendering');
		}

		
		return View::capture($this->_file, $this->_data);
	}

} 
