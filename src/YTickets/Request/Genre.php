<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Genre {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * Возвращает массив жанров.
     * 
     * @param int $city_id Идентификатор города.
     * @return array
     */    
    public function list(int $city_id){
        $params = [
            'action' => 'genre.list',
            'city_id' => $city_id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
