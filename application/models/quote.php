<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model {

	public function create_quote($post)
	{
		$login_id = $this->session->userdata['id'];

		// var_dump($login_id, $post);
		// die();

		$create_query = "INSERT INTO quotes(user_id, quoter, message, CREATED_AT, UPDATED_AT) VALUES ($login_id, ?, ?, NOW(), NOW())";

		$create_values = array($post['quoter'], $post['message']);

		$this->db->query($create_query, $create_values);
	}

	public function get_all()
	{
		
		$login_id = $this->session->userdata['id'];

		$get_query = "SELECT quotes.*, quotes.id as quote_id, users.name FROM quotes LEFT JOIN users ON users.id = quotes.user_id WHERE quotes.id NOT IN(SELECT favorites.quote_id FROM favorites WHERE user_id = $login_id)";
		return $this->db->query($get_query)->result_array();
	}

	public function get_favorites()
	{
		$login_id = $this->session->userdata['id'];

		//$favorites_query = "SELECT favorites.*, quotes.*, quotes.id as quote_id, users.name FROM favorites 
		//JOIN users ON users.id = favorites.user_id A 
		//JOIN quotes ON quotes.id = favorites.quote_id 
		//WHERE favorites.user_id = $login_id";

		$favorites_query = "SELECT favorites.*, quotes.*, quotes.id as quote_id, users.name FROM favorites 
		JOIN quotes ON quotes.id = favorites.quote_id
		JOIN users ON users.id = quotes.user_id
		WHERE favorites.user_id = $login_id";

		return $this->db->query($favorites_query)->result_array();
	}

	public function add_quote($quote_id)
	{
		$login_id = $this->session->userdata['id'];

		$add_query = "INSERT INTO favorites(user_id, quote_id) VALUES($login_id, $quote_id)";

		$this->db->query($add_query);
	}

	public function remove_quote($quote_id)
	{	
		$login_id = $this->session->userdata['id'];
		// var_dump($quote_id, $login_id);
		// die();

		$remove_query = "DELETE FROM favorites WHERE favorites.user_id = $login_id AND favorites.quote_id = $quote_id";

		$this->db->query($remove_query);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */