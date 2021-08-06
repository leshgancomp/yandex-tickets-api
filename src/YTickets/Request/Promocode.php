<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Promocode {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * Возвращает сумму скидки, если переданный в запросе промокод можно применить к предварительно забронированному билету.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param string $code Промокод
     * @return arrray
     */
    public function check(string $uid, int $city_id, string $code){
        $params = [
            'action' => 'promocode.check',
            'uid' => $uid,
            'city_id' => $city_id,
            'code' => $code
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
