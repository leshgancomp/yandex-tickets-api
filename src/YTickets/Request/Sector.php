<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Sector {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * Возвращает схему сектора.
     * 
     * @param int $sector_id Идентификатор сектора.
     * @return type
     */
    public function map(int $sector_id){
        $params = [
            'action' => 'sector.map',
            'sector_id' => $sector_id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив секторов для версии зала.
     * 
     * @param int $version_id Идентификатор версии зала.
     * @return array
     */
    public function list(int $version_id){
        $params = [
            'action' => 'sector.list',
            'version_id' => $version_id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив групп мест в секторе.
     * 
     * @param int $sector_id Идентификатор сектора.
     * @param int $city_id Идентификатор города.
     * @return array
     */
    public function groups(int $sector_id, int $city_id = null){
        $params = [
            'action' => 'sector.groups',
            'sector_id' => $sector_id
        ];
        if ($city_id !== null) $params['city_id'] = $city_id;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
