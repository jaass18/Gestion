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
 * XtraUpload Home Page Controller
 *
 * @package		XtraUpload
 * @subpackage	Controllers
 * @category	Controllers
 * @author		Matthew Glinski
 * @link		http://xtrafile.com/docs/pages/home
 */

// ------------------------------------------------------------------------

class Home extends Controller 
{
	/**
	 * Home()
	 *
	 * The home page controller constructor
	 *
	 * @access	public
	 * @return	none
	 */	
	public function Home()
	{
		parent::Controller();
	}
	
	// ------------------------------------------------------------------------

	
	/**
	 * Home->index()
	 *
	 * The home page for XtraUpload, containing the flash uploader
	 *
	 * @access	public
	 * @return	none
	 */	
	public function index()
	{
		show_404();
	}
}

/* End of file home.php */
/* Location: ./system/applicaton/controllers/home.php */