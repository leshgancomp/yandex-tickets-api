<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Event {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * Возвращает массив секторов с билетами на событие.
     * 
     * @param int $city_id Идентификатор города.
     * @param int $event_id Идентификатор события.
     * @param bool $show_all Флаг, указывающий, что в ответ нужно добавить секторы, в которых закончились билеты.
     * @return array
     */    
    public function sectorList(int $city_id, int $event_id, bool $show_all = null){
        $params = [
            'action' => 'event.sector.list',
            'city_id' => $city_id,
            'event_id' => $event_id            
        ];
        if ($show_all !== null) $params['show_all'] = $show_all;
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив событий.
     * 
     * @param int $city_id Идентификатор города.
     * @param int $limit Максимальное количество возвращаемых объектов.
     * @param int $offset Количество пропускаемых в ответе объектов, начиная с первого.
     * @param int $venue_id Идентификатор места проведения.
     * @param int $genre_id Идентификатор жанра.
     * @param int $activity_id Идентификатор мероприятия.
     * @param string $search Название события.
     * @param string $start_date Дата в формате yyyy-mm-dd, начиная с которой (включительно) события возвращаются в ответе.
     * @param string $end_date Дата в формате yyyy-mm-dd, до которой (включительно) события возвращаются в ответе.
     * @param string $updated_after Дата обновления в формате YYYY-MM-DDThh:mm:ss±hh. Ответ будет содержать только объекты, измененные после этой даты.
     * @return array
     */    
    public function list(
            int $city_id, 
            int $limit = null, 
            int $offset = null, 
            int $venue_id = null, 
            int $genre_id = null, 
            int $activity_id = null, 
            string $search = null, 
            string $start_date = null, 
            string $end_date = null, 
            string $updated_after = null
    ){
        $params = [
            'action' => 'event.list',
            'city_id' => $city_id
        ];
        if ($limit !== null) $params['limit'] = $limit;
        if ($offset !== null) $params['offset'] = $offset;
        if ($venue_id !== null) $params['venue_id'] = $venue_id;
        if ($genre_id !== null) $params['genre_id'] = $genre_id;
        if ($activity_id !== null) $params['activity_id'] = $activity_id;
        if ($search !== null) $params['search'] = $search;
        if ($start_date !== null) $params['start_date'] = $start_date;
        if ($end_date !== null) $params['end_date'] = $end_date;
        if ($updated_after !== null) $params['updated_after'] = $updated_after;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает информацию о событии.
     * 
     * @param int $cityId Идентификатор города.
     * @param int $eventId Идентификатор события.
     * @param bool $organizer Флаг, указывающий, что в ответ нужно добавить массих данных организатора.
     * @param bool $html Флаг, указывающий, что описание события должно вернуться с HTML-разметкой.
     * @param bool $discount Флаг, указывающий, что в ответ нужно добавить массив скидок.
     * @return array
     */
    public function detail(
            int $cityId, 
            int $eventId, 
            bool $organizer = null, 
            bool $html = null, 
            bool $discount = null
    ){
        $params = [
            'action' => 'event.detail',
            'city_id' => $cityId,
            'event_id' => $eventId,
        ];
        if ($organizer !== null) $params['organizer'] = $organizer;
        if ($html !== null) $params['html'] = $html;
        if ($discount !== null) $params['discount'] = $discount;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
