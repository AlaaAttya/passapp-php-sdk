<?php

namespace PassApp\Lib\Passes;


interface PassInterface {

    // Create a new Pass
    public function create($data);

    // Update an existing pass
    public function update($pass_id, $data);

    // Delete existing pass
    public function delete($pass_id);
}