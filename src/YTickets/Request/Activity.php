<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Activity {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * Возвращает массив мероприятий.
     * 
     * @param int $cityId - Идентификатор города.
     * @param int $limit - Максимальное количество возвращаемых объектов.
     * @param int $offset - Количество пропускаемых в ответе объектов, начиная с первого.
     * @return array
     */    
    public function list(int $cityId, int $limit = null, int $offset = null){
        $params = [
            'action' => 'activity.list',
            'city_id' => $cityId,    
        ];
        if ($limit !== null) $params['limit'] = $limit;
        if ($offset !== null) $params['offset'] = $offset;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
