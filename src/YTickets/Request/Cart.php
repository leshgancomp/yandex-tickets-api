<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Cart {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * Снимает предварительную бронь билета.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор билета.
     * @return array
     */   
    public function remove(string $uid, int $city_id, int $id){
        $params = [
            'action' => 'cart.remove',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив способов оплаты.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @return array
     */
    public function payments(string $uid, int $city_id){
        $params = [
            'action' => 'cart.payments',
            'uid' => $uid,
            'city_id' => $city_id,
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив предварительно забронированных билетов.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @return array
     */
    public function detail(string $uid, int $city_id){
        $params = [
            'action' => 'cart.detail',
            'uid' => $uid,
            'city_id' => $city_id,
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив вариантов доставки.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @return array
     */
    public function deliveries(string $uid, int $city_id){
        $params = [
            'action' => 'cart.deliveries',
            'uid' => $uid,
            'city_id' => $city_id,
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Предварительно бронирует билет.
     * Билет находится в корзине 15 минут, после чего бронь снимается.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор билета.
     * @return array
     */   
    public function add(string $uid, int $city_id, int $id){
        $params = [
            'action' => 'cart.add',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
