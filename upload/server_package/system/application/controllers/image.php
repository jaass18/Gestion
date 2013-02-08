<?php
/**
 * XtraUpload
 *
 * A turn-key open source web 2.0 PHP file uploading package requiring PHP v5
 *
 * @package		XtraUpload
 * @author		Matthew Glinski
 * @copyright	Copyright (c) 2006, XtraFile.com
 * @license		http://xtrafile.com/docs/license
 * @link		http://xtrafile.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * XtraUpload Image Page Controller
 *
 * @package		XtraUpload
 * @subpackage	Controllers
 * @category	Controllers
 * @author		Matthew Glinski
 * @link		http://xtrafile.com/docs/pages/files
 */

// ------------------------------------------------------------------------


class Image extends Controller 
{
	public function Image()
	{
		parent::Controller();
		$this->load->model('files/files_db');
		$this->load->library('functions');
		$this->lang->load('image');
	}
	
	public function index()
	{
		redirect('home');
	}
	
	public function thumb($id, $name)
	{
		$file = $this->files_db->getFileObject($id);
		$type = strtolower($file->type);
		
		if($type == "gif")
		{
			$type == 'gif';
		}
		else if($type == "bmp")
		{
			$type == 'bmp';
		}
		else if($type == "jpg")
		{
			$type == 'jpeg';
		}
		else if($type == "png")
		{
			$type == 'png';
		}
	
		header("Content-type: image/".$type);
		echo file_get_contents($file->thumb);
	}
	
	public function direct($id, $name)
	{
		$file = $this->files_db->getFileObject($id);
		$this->files_db->addToDownloads($id);
		$type = strtolower($file->type);
		
		if($type == "gif")
		{
			$type == 'gif';
		}
		else if($type == "bmp")
		{
			$type == 'bmp';
		}
		else if($type == "jpg")
		{
			$type == 'jpeg';
		}
		else if($type == "png")
		{
			$type == 'png';
		}
	
		header("Content-type: image/".$type);
		echo file_get_contents($file->filename);
	}
}
?>