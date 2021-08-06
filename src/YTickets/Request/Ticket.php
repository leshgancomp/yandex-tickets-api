<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Ticket {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * @param int $city_id Идентификатор города.
     * @param int $event_id Идентификатор события.
     * @param int $sector_id Идентификатор сектора.
     * @param bool $add_groups Флаг, указывающий, что в ответ необходимо добавить билеты из групп.
     * @return array
     */
    public function list(int $city_id, int $event_id, int $sector_id = null, bool $add_groups = null){
        $params = [
            'action' => 'ticket.list',
            'city_id' => $city_id,
            'event_id' => $event_id
        ];
        if ($sector_id !== null) $params['sector_id'] = $sector_id;
        if ($add_groups !== null) $params['add_groups'] = $add_groups;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
