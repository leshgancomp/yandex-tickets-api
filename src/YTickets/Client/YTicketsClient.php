<?php

namespace YTickets\Client;

use YTickets\Request\City;
use YTickets\Request\Activity;
use YTickets\Request\Event;
use YTickets\Request\Genre;
use YTickets\Request\Order;
use YTickets\Request\Sector;
use YTickets\Request\Ticket;
use YTickets\Request\Venue;
use YTickets\Request\Cart;
use YTickets\Request\Promocode;

class YTicketsClient {
    
    /**
     *
     * @var PowerBiRequest
     */
    private $request;
    
    /**
     * @var type Activity
     */
    private $Activity;
    
    /**
     * @var type City
     */
    private $City;
    
    /**
     * @var type Event
     */
    private $Event;
    
    /**
     * @var type Genre
     */
    private $Genre;
    
    /**
     * @var type Order
     */
    private $Order;
    
    /**
     * @var type Sector
     */
    private $Sector;
    
    /**
     * @var type Ticket
     */
    private $Ticket;
    
    /**
     * @var type Venue
     */
    private $Venue;
    
    /**
     * @var type Promocode
     */
    private $Promocode;
    
    /**
     * @var type Cart
     */
    private $Cart;
    

    public function __construct($username, $password) {
        $this->request = new YTicketsRequest($username, $password);
    }
    
    /**
     * 
     * Список мероприятий
     * 
     * @return Activity
     */    
    public function Activity(): Activity {
        if (!$this->Activity) {
            $this->Activity = new Activity($this->request);
        }
        return $this->Activity;
    }
    
    /**
     * 
     * Список городов
     * 
     * @return City
     */    
    public function City(): City {
        if (!$this->City) {
            $this->City = new City($this->request);
        }
        return $this->City;
    }
    
    /**
     * 
     * Информация о событии
     * 
     * @return Event
     */    
    public function Event(): Event {
        if (!$this->Event) {
            $this->Event = new Event($this->request);
        }
        return $this->Event;
    }
    
    /**
     * 
     * Список жанров
     * 
     * @return Genre
     */    
    public function Genre(): Genre {
        if (!$this->Genre) {
            $this->Genre = new Genre($this->request);
        }
        return $this->Genre;
    }
    
    /**
     * 
     * Информация о заказе
     * 
     * @return Order
     */    
    public function Order(): Order {
        if (!$this->Order) {
            $this->Order = new Order($this->request);
        }
        return $this->Order;
    }
    
    /**
     * 
     * Cписок групп в секторе
     * 
     * @return Sector
     */    
    public function Sector(): Sector {
        if (!$this->Sector) {
            $this->Sector = new Sector($this->request);
        }
        return $this->Sector;
    }
    
    /**
     * 
     * Список свободных билетов
     * 
     * @return Ticket
     */    
    public function Ticket(): Ticket {
        if (!$this->Ticket) {
            $this->Ticket = new Ticket($this->request);
        }
        return $this->Ticket;
    }
    
    /**
     * 
     * Информация о месте проведения
     * 
     * @return Venue
     */    
    public function Venue(): Venue {
        if (!$this->Venue) {
            $this->Venue = new Venue($this->request);
        }
        return $this->Venue;
    }
    
    /**
     * 
     * Проверка промокода
     * 
     * @return Promocode
     */    
    public function Promocode(): Promocode {
        if (!$this->Promocode) {
            $this->Promocode = new Promocode($this->request);
        }
        return $this->Promocode;
    }
    
    /**
     * 
     * Работа с заказами
     * 
     * @return Cart
     */    
    public function Cart(): Cart {
        if (!$this->Cart) {
            $this->Cart = new Cart($this->request);
        }
        return $this->Cart;
    }
    
}
