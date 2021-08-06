<?php

namespace YTickets\Request;

use YTickets\Client\YTicketsRequest;

class Order {
    
    private $request;

    public function __construct(YTicketsRequest $request) {
        $this->request = $request;
    }
    
    /**
     * 
     * Аннулирует билет в заказе.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор билета.
     * @return array
     */
    public function ticketRemove(string $uid, int $city_id, int $id){
        $params = [
            'action' => 'order.ticket.remove',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Изменяет статус заказа на «продан».
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор заказа.
     * @return array
     */
    public function sold(string $uid, int $city_id, int $id){
        $params = [
            'action' => 'order.sold',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает HTML-форму с кнопкой перехода на страницу оплаты.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор заказа.
     * @return array
     */
    public function payment(string $uid, int $city_id, int $id){
        $params = [
            'action' => 'order.payment',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает PDF-файл с электронным билетом или массив PDF-файлов для нескольких билетов в строке Base64.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор заказа.
     * @param string $currency Валюта, отображаемая в шаблоне билета.
     * @param bool $delimited Флаг, указывающий, что билеты необходимо разделить по файлам.
     * @return array
     */
    public function eticket(string $uid, int $city_id, int $id, string $currency = null, bool $delimited = null){
        $params = [
            'action' => 'order.eticket',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id,
        ];        
        if ($currency !== null) $params['currency'] = $currency;
        if ($delimited !== null) $params['delimited'] = $delimited;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Отправляет электронный билет покупателю.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор заказа.
     * @param string $currency Валюта, отображаемая в шаблоне билета.
     * @return array
     */
    public function eticketSend(string $uid, int $city_id, int $id, string $currency){
        $params = [
            'action' => 'order.eticket.send',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id,
            'currency' => $currency
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Изменяет статус заказа на «доставка».
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор заказа.
     * @return array
     */
    public function delivery(string $uid, int $city_id, int $id){
        $params = [
            'action' => 'order.delivery',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Изменяет статус заказа на «аннулирован».
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор заказа.
     * @return array
     */
    public function cancel(string $uid, int $city_id, int $id){
        $params = [
            'action' => 'order.cancel',
            'uid' => $uid,
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает идентификатор созданного заказа.
     * 
     * @param string $uid Идентификатор сессии, постоянный для всей сессии (не менее 20 символов).
     * @param int $city_id Идентификатор города.
     * @param string $name Имя покупателя.
     * @param string $phone Номер телефона покупателя.
     * @param string $email Электронный адрес покупателя.
     * @param string $address Адрес доставки заказа.
     * @param int $customer_id Идентификатор покупателя.
     * @param string $utm_source UTM-метка.
     * @param string $promocode Промокод.
     * @param float $amount Сумма номинальной стоимости билетов.
     * @param string $lang Язык покупателя. Возможные значения: ru — русский (по умолчанию); en — английский; ee — эстонский.
     * @param int $payment_id Идентификатор способа оплаты.
     * @param int $delivery_id Идентификатор варианта доставки.
     * @param string $delivery_day Дата доставки в формате yyyy-mm-dd.
     * @return array
     */
    public function create(
            string $uid,
            int $city_id, 
            string $name, 
            string $phone, 
            string $email = null, 
            string $address = null, 
            int $customer_id = null, 
            string $utm_source = null, 
            string $promocode = null, 
            float $amount = null, 
            string $lang = null, 
            int $payment_id = null, 
            int $delivery_id = null, 
            string $delivery_day = null
    ){
        $params = [
            'action' => 'order.create',
            'uid' => $uid,
            'city_id' => $city_id,
            'name' => $name,
            'phone' => $phone
        ];
        if ($email !== null) $params['email'] = $email;
        if ($address !== null) $params['address'] = $address;
        if ($customer_id !== null) $params['customer_id'] = $customer_id;
        if ($utm_source !== null) $params['utm_source'] = $utm_source;
        if ($promocode !== null) $params['promocode'] = $promocode;
        if ($amount !== null) $params['amount'] = $amount;
        if ($lang !== null) $params['lang'] = $lang;
        if ($payment_id !== null) $params['payment_id'] = $payment_id;
        if ($delivery_id !== null) $params['delivery_id'] = $delivery_id;
        if ($delivery_day !== null) $params['delivery_day'] = $delivery_day;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив проданных билетов.
     * 
     * @param int $city_id Идентификатор города.
     * @param int $event_id Идентификатор события.
     * @param string $start_date Дата в формате yyyy-mm-dd, начиная с которой (включительно) заказы возвращаются в ответе.
     * @param string $end_date Дата в формате yyyy-mm-dd, до которой (включительно) заказы возвращаются в ответе.
     * @return array
     */
    public function ticketList(int $city_id, int $event_id = null, string $start_date = null, string $end_date = null){
        $params = [
            'action' => 'order.ticket.list',
            'city_id' => $city_id,
        ];
        if ($event_id !== null) $params['event_id'] = $event_id;
        if ($start_date !== null) $params['start_date'] = $start_date;
        if ($end_date !== null) $params['end_date'] = $end_date;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает массив заказов.
     * 
     * @param int $city_id Идентификатор города.
     * @param int $status Статус заказа. Возможные значения: 0 — аннулирован; 1 — продан; 2 — бронь; 3 — доставка.
     * @param string $start_date Дата в формате yyyy-mm-dd, начиная с которой (включительно) заказы возвращаются в ответе.
     * @param string $end_date Дата в формате yyyy-mm-dd, до которой (включительно) заказы возвращаются в ответе.
     * @param int $customer_id Идентификатор покупателя.
     * @return array
     */
    public function list(int $city_id, int $status = null, string $start_date = null, string $end_date = null, int $customer_id = null){
        $params = [
            'action' => 'order.list',
            'city_id' => $city_id,
        ];
        if ($status !== null) $params['status'] = $status;
        if ($start_date !== null) $params['start_date'] = $start_date;
        if ($end_date !== null) $params['end_date'] = $end_date;
        if ($customer_id !== null) $params['customer_id'] = $customer_id;
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
    /**
     * 
     * Возвращает информацию о заказе.
     * 
     * @param int $city_id Идентификатор города.
     * @param int $id Идентификатор заказа.
     * @return array
     */
    public function info(int $city_id, int $id){
        $params = [
            'action' => 'order.info',
            'city_id' => $city_id,
            'id' => $id
        ];
        
        return $this->request->execute($params, YTicketsRequest::METHOD_POST);
    }
    
}
