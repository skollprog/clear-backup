<?php

	class clearBackup
	{
		private $updraft = "updraft/";
		private $route = "";

		public function route($route = "")
		{
			$this->route = $route.$this->updraft;
		}

		public function scan()
		{
			$filters = array(
				".",
				"..",
				".htaccess",
				"emptydir",
				"index.html",
				"web.config"
			);
			$this->files = array_diff(scandir($this->route), $filters);
		}

		public function purge()
		{
			$this->scan();
			foreach ($this->files as $file)
			{
				$now  = date("Y-m-d");
				$date = substr($file, 7, 10);
				$target = $this->route.$file;
				if ($date != $now && file_exists($target))
				{
					if (unlink($target)) $this->deleted[] = $target;
				}
			}
			$this->left = $this->scan();
			return $this->results();
		}

		public function results()
		{
			$results = array(
				"files" => $this->files,
				"deleted" => $this->deleted,
				"left" => $this->left
			);
			return $results;
		}
	}

?>
