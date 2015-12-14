<?php

/**
 * Ticket pass modeling
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 */
namespace PassApp\Lib\Passes;

use PassApp\Lib\HTTP\PassAppRequest;

class TicketPass extends BasePass implements PassInterface {


    /**
     * Set the passable type to be 'Ticket' by default
     * for Event passes
     */
    public function __construct() {
        $this->passable_type = PassableType::Ticket;
        $this->setAccepted(true);
        $this->setExpired(false);
        $this->setParentId(null);
        $this->setExpirationType(ExpirationType::Checkins);
        $this->setCheckinMaximum(1);
    }

    /**
     * @var string passable attributes title
     */
    private $title;

    /**
     * @var string  passable attributes price
     */
    private $price;

    /**
     * @var string  passable attributes currency
     */
    private $currency;

    /**
     * @var string  passable attributes payment status
     * Excepeted vales are 'paid', 'not_paid'
     */
    private $payment_status;

    /**
     * @var string  passable attributes icon url
     */
    private $icon;

    /**
     * @var string  passable attributes event name
     */
    private $event_name;

    /**
     * @var string  passable attributes description
     */
    private $description;

    /**
     * Get passable type
     *
     * @return string
     */
    private function getPassableType() {
        return $this->passable_type;
    }

    /**
     * Get passable title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Get passable event price
     *
     * @return string
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Get passable event currency
     *
     * @return string
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * Get passabel event payment status
     *
     * @return string
     */
    public function getPaymentStatus() {
        return $this->payment_status;
    }

    /**
     * Get passable event icon url
     *
     * @return string
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * Get passable event name
     *
     * @return string
     */
    public function getEventName() {
        return $this->event_name;
    }

    /**
     * Get passable event description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set passable event title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * Set passable event price
     *
     * @param string $price
     * @return Event
     */
    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    /**
     * Set passable event currency
     *
     * @param string $currency
     * @return Event
     */
    public function setCurrency($currency) {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Set passable event payment status
     *
     * @param string $payment_status
     * @return Event
     */
    public function setPaymentStatus($payment_status) {
        $this->payment_status = $payment_status;
        return $this;
    }

    /**
     * Set passable event icon url
     *
     * @param string $icon
     * @return string
     */
    public function setIcon($icon) {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Set passable event name
     */
    public function setEventName($event_name) {
        $this->event_name = $event_name;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * Turn the pass Object to array
     *
     * @return array
     */
    public function toArray() {
        $pass_array = parent::toArray();
        /**
         * Shenouda Bertel Recommended Changes
         */
        $passable_attaributes = array(
            "title" => $this->getTitle(),
            "price" => $this->getPrice(),
            "currency" => $this->getCurrency(),
            "payment_status" => $this->getPaymentStatus(),
            "event_name" => $this->getEventName(),
        );
        $pass_array['passable_type'] = $this->getPassableType();
        $pass_array['passable_attributes'] = $passable_attaributes;
        $pass_array['expiration_type'] = $this->getExpirationType();
        $pass_array['checkin_maximum'] = $this->getCheckinMaximum();

        return array("pass" => $pass_array);
    }

    /**
     * Load pass data
     *
     * @param array $data
     * @return Event
     */
    public function load($data) {
        parent::load($data);

        $this->setTitle($data['passable_attributes']['title']);
        $this->setPrice($data['passable_attributes']['price']);
        $this->setCurrency($data['passable_attributes']['currency']);
        $this->setPaymentStatus($data['passable_attributes']['payment_status']);
        $this->setIcon($data['passable_attributes']['icon']);
        $this->setEventName($data['passable_attributes']['event_name']);
        $this->setDescription($data['passable_attributes']['description']);
        $this->setExpirationType(ExpirationType::Checkins);
        $this->setCheckinMaximum(1);

        return $this;
    }

    /**
     * Create a new Ticket pass
     *
     * @param   array   $data
     * @return  array
     */
    public function create($data) {
        // TODO: Implement create() method.
        return $this->_request_client->create('POST', 'passes/create', $data, array());
    }

    /**
     * Update an existing Ticket pass
     *
     * @param   string  $pass_id
     * @param   array   $data
     */
    public function update($pass_id, $data) {
        // TODO: Implement update() method.
        return $this->_request_client->create('PUT', 'passes/{$pass_id}', $data, array());
    }

    /**
     * Delete an existing Ticket pass
     *
     * @param   string  $pass_id
     * @return  array
     */
    public function delete($pass_id) {
        // TODO: Implement delete() method.
        return $this->_request_client->create('DELETE', 'passes/{$pass_id}', $data, array());
    }
}