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
 * XtraUpload Upload Page Controller
 *
 * @package		XtraUpload
 * @subpackage	Controllers
 * @category	Controllers
 * @author		Matthew Glinski
 * @link		http://xtrafile.com/docs/pages/files
 */

// ------------------------------------------------------------------------

class Upload extends Controller 
{
	public function Upload()
	{
		parent::Controller();	
		$this->lang->load('upload');
	}
	
	// ------------------------------------------------------------------------

	public function index()
	{
		redirect('/home');
	}
	
	// ------------------------------------------------------------------------
	
	public function url_process()
	{
		$this->load->library('remotefile');
		
		// Load post data
		$uid = $this->input->post('fid');
		$url = $this->input->post('link');
		$user = $this->input->post('user');
		
		if(intval($user) != 0)
		{
			$userobj = $this->users->getUserById($user);
			$this->startup->getGroup($userobj->group);
			unset($userobj);
		}
		
		session_write_close();
		$file = $this->remotefile->fetchFile($url, $uid, intval($this->startup->group_config->upload_size_limit));
		
		if(is_file($file))
		{
			$is_image = $this->functions->is_image($file);
			
			$nfile = './temp/'.basename($url);
			rename($file, $nfile);
			
			$this->files_db->newFile($nfile, $uid, $user, (bool)$is_image, base_url(), true);
			echo $this->lang->line('upload_controller_2');
		}
		else
		{
			echo $this->lang->line('upload_controller_3');
		}
	}
	
	// ------------------------------------------------------------------------

	public function process($secid='', $user=0)
	{

		if(intval($user) != 0)
		{
			$userobj = $this->users->getUserById(intval($user));
			$this->startup->getGroup($userobj->group);
			unset($userobj);
		}
		
		$config['upload_path'] = './temp/';
		$config['allowed_types'] = $this->startup->group_config->files_types;
		$config['max_size']	= (1024 * intval($this->startup->group_config->upload_size_limit));
		$this->load->library('upload', $config);	
				
		if($this->upload->do_upload('Filedata'))
		{
			$data = $this->upload->data();
			$file = $data['full_path'];
						
			$this->files_db->newFile($file, $secid, $user, (bool)$data['is_image'], base_url(), false);
			echo "WIN";
		}
		else
		{
		    $this->files_db->setUploadFailed($secid, str_replace('upload_', '', $this->upload->error_num[0]));
			echo "FAIL";	
		}
	}
}
?>