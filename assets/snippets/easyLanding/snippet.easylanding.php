<?php
class Landing extends DocumentParser{
	public function outputContent($noEvent = false){
		$this->documentOutput = $this->documentContent;
		
		if (strpos($this->documentOutput, '[!') > -1) {
            $this->recentUpdate = $_SERVER['REQUEST_TIME'] + $this->config['server_offset_time'];

            $this->documentOutput = str_replace('[!', '[[', $this->documentOutput);
            $this->documentOutput = str_replace('!]', ']]', $this->documentOutput);

            // Parse document source
            $this->documentOutput = $this->parseDocumentSource($this->documentOutput);
        }
		
		echo $this->documentOutput;
	}
	 
}


if (!isset($params['orderBy'])) {
    $params['orderBy'] = 'menuindex ASC';
}

if (!isset($params['parent'])) {
    $params['parent'] = $modx->documentIdentifier;
}

if (!isset($params['where'])) {
    $params['where'] = "parent=".$params['parent']." AND published=1";
}

$result = $modx->db->select("id", $modx->getFullTableName('site_content'), $params['where'], $params['orderBy']);  
$childDoc = $modx->db->makeArray( $result );   

foreach($childDoc as $doc){
	$data_out = new Landing();
	$data_out->config = $modx->config;
	$data_out->documentIdentifier = $doc['id'];
	$data_out->documentMethod = 'id';
	$data_out->prepareResponse();
}
