<?php


class Yahoocricket {
    
    public $host = 'https://query.yahooapis.com/v1/public/yql?diagnostics=true&env=store%3A%2F%2F0TxIGQMQbObzvU4Apia0V0';
    public function __construct(){
      
    }
    
    function getContent($url) 
    { 
       $result = file_get_contents($url);
       return $result; 
    
    }
    
    public function getTeam(){
        $url        = $this->host;
        $url        .= "&q=select%20*%20from%20cricket.teams";
        $html       = $this->getContent($url);
        $html       = simplexml_load_string($html);
        $teamList   = $html->results;
        return $teamList;
    }
    
    public function getNews(){
        $url        = $this->host;
        $url        .= "&q=select%20*%20from%20cricket.news%20%20where%20region%3D%22in%22";
        $html       = $this->getContent($url);
        $html       = simplexml_load_string($html);
        $newsList   = $html->results;
        return $newsList;
    }
    
    public function getTeamDetails($teamId){
        $url        = $this->host;
        $url        .= "&format=json&q=select%20*%20from%20cricket.team.profile%20where%20team_id%3D".$teamId;
        $html       = $this->getContent($url);
        $html       = json_decode($html);
        return $html;
    }
}
