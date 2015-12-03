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
     * Initialize a new ticket object
     */
    public function __construct($pass_app_base) {
        parent::__construct($pass_app_base);
    }

    /**
     * Create a new Ticket pass
     *
     * @param   array   $data
     * @return  array
     */
    public function create($data) {
        // TODO: Implement create() method.
        return $this->_request->create('POST', 'passes/create', $data, array());
    }

    /**
     * Update an existing Ticket pass
     *
     * @param   string  $pass_id
     * @param   array   $data
     */
    public function update($pass_id, $data) {
        // TODO: Implement update() method.
        return $this->_request->create('PUT', 'passes/{$pass_id}', $data, array());
    }

    /**
     * Delete an existing Ticket pass
     *
     * @param   string  $pass_id
     * @return  array
     */
    public function delete($pass_id) {
        // TODO: Implement delete() method.
        return $this->_request->create('DELETE', 'passes/{$pass_id}', $data, array());
    }
}