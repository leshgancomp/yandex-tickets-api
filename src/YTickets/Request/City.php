<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class City {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * Возвращает массив городов.
     * 
     * @param string $updated_after - Дата обновления в формате YYYY-MM-DDThh:mm:ss±hh. Ответ будет содержать только объекты, измененные после этой даты.
     * @return array
     */    
    public function list(string $updated_after = null){
        $params = [
            'action' => 'city.list'
        ];
        if ($updated_after !== null) $params['updated_after'] = $updated_after;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
