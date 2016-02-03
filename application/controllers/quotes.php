<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function dashboard()
	{
		//Getting ALL Quotes EXCEPT favorites
		$get_quote = $this->quote->get_all();

		//Getting ALL FAVORITES
		$get_favorite = $this->quote->get_favorites();

		$this->load->view('dashboard', array(
			"get_quote" => $get_quote,
			"get_favorites" => $get_favorite
			)
		);
	}

	public function create_quote()
	{
		$this->quote->create_quote($this->input->post());
		redirect('/dashboard');
	}

	public function add($quote_id)
	{
		$this->quote->add_quote($quote_id);
		redirect('/dashboard');
	}

	public function remove($quote_id)
	{
		$this->quote->remove_quote($quote_id);
		redirect('/dashboard');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */