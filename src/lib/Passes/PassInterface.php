<?php

namespace PassApp\Lib\Passes;

/**
 * Common methods to be implemented by all the pass types
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 */
interface PassInterface {

    // Create a new Pass
    public function create($data);

    // Update an existing pass
    public function update($pass_id, $data);

    // Delete existing pass
    public function delete($pass_id);
}