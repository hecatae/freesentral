<?

require_once("framework.php");

class Music_On_Hold extends Model
{
	public static function variables()
	{
		return array(
					"music_on_hold_id" => new Variable("serial","!null"),
					"music_on_hold" => new Variable("text","!null"),
					"description" => new Variable("text")
				);
	}

	function __construct()
	{
		parent::__construct();
	}

	public function getTableName()
	{
		return "music_on_hold";
	}
}

?>