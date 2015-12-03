<?php

namespace PassApp\Lib;

use PassApp\Lib\Passes\BoardingPass;
use PassApp\Lib\Passes\InvitationPass;
use PassApp\Lib\Passes\MembershipPass;
use PassApp\Lib\Passes\PassableType;
use PassApp\Lib\Passes\TicketPass;
use PassApp\Lib\Exceptions\InvalidPassableTypeException;

/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 03/12/15
 * Time: 09:19 م
 */
class PassFactory {


    private $_pass_app_base;

    /**
     * Set the base pass app API attributes
     *
     * @param   string  $pass_app_base
     */
    public function __construct($pass_app_base) {
        $this->_pass_app_base;
    }

    /**
     * Create Pass object according to its type
     *
     * @param   string  $pass_type
     * @return  Object
     */
    public function getInstance($pass_type) {
        $pass_object = null;

        switch($pass_type) {
            case PassableType::TICKET_PASS:
                $pass_object = new TicketPass($this->_pass_app_base);
                break;
            case PassableType::BOARDING_PASS:
                $pass_object = new BoardingPass($this->_pass_app_base);
                break;
            case PassableType::INVITATION_PASS:
                $pass_object = new InvitationPass($this->_pass_app_base);
                break;
            case PassableType::MEMBERSHIP_PASS;
                $pass_object = new MembershipPass($this->_pass_app_base);
                break;
            default:
                throw new InvalidPassableTypeException("Invalid passable type $pass_type, allowed vales are 'Ticket', 'Boarding', 'Invitation' and 'Membership'");
                break;
        }

        return $pass_object;
    }
}