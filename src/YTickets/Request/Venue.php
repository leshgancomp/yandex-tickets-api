<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Venue {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * @param int $city_id Идентификатор города.
     * @param int $limit Максимальное количество возвращаемых объектов.
     * @param int $offset Количество пропускаемых в ответе объектов, начиная с первого.
     * @param string $updated_after Дата обновления в формате YYYY-MM-DDThh:mm:ss±hh. Ответ будет содержать только объекты, измененные после этой даты.
     * @return array
     */
    public function list(int $city_id, int $limit = null, int $offset = null, string $updated_after = null){
        $params = [
            'action' => 'venue.list',
            'city_id' => $city_id
        ];
        if ($limit !== null) $params['limit'] = $limit;
        if ($offset !== null) $params['offset'] = $offset;
        if ($updated_after !== null) $params['updated_after'] = $updated_after;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает информацию о месте проведения с доступными для продажи событиями.
     * 
     * @param int $city_id Идентификатор города.
     * @param int $venue_id Идентификатор места проведения.
     * @return array
     */
    public function detail(int $city_id, int $venue_id){
        $params = [
            'action' => 'venue.detail',
            'city_id' => $city_id,
            'venue_id' => $venue_id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
