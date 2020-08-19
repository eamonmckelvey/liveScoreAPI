<?php

class LivescoreApi {

	public $connection = null;
	protected $_baseUrl = "https://livescore-api.com/api-client/";

	public function __construct() {
		$this->connection = mysqli_connect('localhost', 'root', 'root');
		$this->connection->select_db('ls_videos');
	}

	public function buildUrl($endpoint) {
		return $this->_baseUrl . $endpoint . "key=".KEY."&secret=" . SECRET;
	}
	
	//<a href="http://livescore-api.com/api-client/scores/events.json?key=Ka88B6jZrxO8dDQt&secret=L233yXpNCWQDZyxJIGSkNbjeI8nWLdqw&id=129180">events</a>
	
	
	
    public function getMatchInfo() {
		
  if(isset($_GET['id'])){
        $id = $_GET['id'];
    } //this check entirely optional, but I'd do it
    else{
        $id = 129180; //or some other default you want, or error handling here
    }		$url = $this->buildUrl('scores/events.json?key=Bk8uudWqFNIMbaCq&secret=nzzvNvO4f8VOKWAmhJQLWNbCAToM30cr&id=' .$id);
		return $this->makeRequest($url);
	}
	
	 public function getMatchStats() {
		
  if(isset($_GET['match_id'])){
        $id = $_GET['match_id'];
		$test = '&key=Bk8uudWqFNIMbaCq&secret=nzzvNvO4f8VOKWAmhJQLWNbCAToM30cr';
    } //this check entirely optional, but I'd do it
    else{
        $id = 129180; //or some other default you want, or error handling here
    }		
	    $url = $this->buildUrl('matches/stats.json?match_id=' .$id .$test);
		return $this->makeRequest($url);
	}
	
	// Ukraine = 18
	// poland 19
	// 25 england
	// 45 championship
	//46 ligue 1
	// dutch 47
	// belgium 48
	// portuguese 49
	// czech 52
	// romania 58
	// turkey 71
	// serie a 73
	// la liga 74
	// argentina 97
	//germany 114
	
	
	//<a href="http://livescore-api.com/api-client/leagues/table.json?key=Ka88B6jZrxO8dDQt&secret=L233yXpNCWQDZyxJIGSkNbjeI8nWLdqw&league=25&season=2">table</a>
	
	public function getLeagueTables() {
		
		if(isset($_GET['league_id'])){
        $id = $_GET['league_id'];
		$test = '&season=4';
    } //this check entirely optional, but I'd do it
    else{
        $id = 129180; //or some other default you want, or error handling here
		$test = '&season=4';
    }		
	//<a href="http://livescore-api.com/api-client/leagues/table.json?key=Ka88B6jZrxO8dDQt&secret=L233yXpNCWQDZyxJIGSkNbjeI8nWLdqw&league=25&season=2">table</a>

		$url = $this->buildUrl('leagues/table.json?key=Bk8uudWqFNIMbaCq&secret=nzzvNvO4f8VOKWAmhJQLWNbCAToM30cr&league=' .$id .$test);
		return $this->makeRequest($url);
	}
	
	public function getLeagueFixtures() {
		
		if(isset($_GET['competition_id'])){
        $id = $_GET['competition_id'];
		$test = '&';
		
    } //this check entirely optional, but I'd do it
    else{
        $id = 129180; //or some other default you want, or error handling here
		$test = '&';
    }		
	//<a href="https://livescore-api.com/api-client/fixtures/matches.json?competition_id=339&key=Bk8uudWqFNIMbaCq&secret=nzzvNvO4f8VOKWAmhJQLWNbCAToM30cr">matches</a>
		$url = $this->buildUrl('fixtures/matches.json?competition_id=' .$id .$test);
		return $this->makeRequest($url);
	}



	public function getLiveScores() {
		$url = $this->buildUrl('scores/live.json?');
		return $this->makeRequest($url);
	}
	

	public function getTopScorer() {
		
			
		if(isset($_GET['competition_id'])){
        $id = $_GET['competition_id'];
		$amp = '&';
    } //this check entirely optional, but I'd do it
    else{
        $id = 3; //or some other default you want, or error handling here
		$test = '&';
    }

		$url = $this->buildUrl('competitions/goalscorers.json?competition_id=' .$id .$amp);
		return $this->makeRequest($url);
	}
	
//	public function getTopScorersSpain() {
//		$url = $this->buildUrl('competitions/goalscorers.json?competition_id=3&');
//		return $this->makeRequest($url);
//	}
//	
//	
//	public function getTopScorersItaly() {
//		$url = $this->buildUrl('competitions/goalscorers.json?competition_id=4&');
//		return $this->makeRequest($url);
//	}
//	
//	public function getTopScorersEuropaLeague() {
//		$url = $this->buildUrl('competitions/goalscorers.json?competition_id=245&');
//		return $this->makeRequest($url);
//	}
	
	
	//<a href="http://livescore-api.com/api-client/competitions/goalscorers.json?competition_id=1&key=demo_key&secret=demo_secret">goalscorers</a>
	//<a href="http://livescore-api.com/api-client/scores/live.json?key=demo_key&secret=demo_secret">live</a>

	public function makeRequest($url) {
		$cached = $this->useCache($url);
		if ($cached) {
			return json_decode($cache, true);
		}

		$json = file_get_contents($url);
		$this->saveCache($url, $json);

		return json_decode($json, true);
	}

	public function useCache($url) {
		$url = mysqli_escape_string($this->connection, crc32($url));
		$query = "SELECT json FROM cache WHERE url = '$url' AND time > DATE(NOW()-INTERVAL 60 SECOND)";
		$result = mysqli_query($this->connection, $query);

		if (!mysqli_num_rows($result)) {
			return false;
		}

		$row = mysqli_fetch_assoc($result);
		return $row['json'];
	}

	public function saveCache($url, $json) {
		$url = mysqli_escape_string($this->connection, crc32($url));
		$json = mysqli_escape_string($this->connection, $json);

		$query = "INSERT INTO cache (url, json, time) VALUES ('$url', '$json', NOW())
				ON DUPLICATE KEY UPDATE json = '$json', `time` = NOW()";
		mysqli_query($this->connection, $query);
	}
}