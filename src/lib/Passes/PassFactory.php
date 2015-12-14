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

    /**
     * Create Pass object according to its type
     *
     * @param   string  $pass_type
     * @return  Object
     */
    public static function getInstance($pass_type) {
        $pass_object = null;

        switch($pass_type) {
            case PassableType::TICKET_PASS:
                $pass_object = new TicketPass();
                break;
            case PassableType::BOARDING_PASS:
                $pass_object = new BoardingPass();
                break;
            case PassableType::INVITATION_PASS:
                $pass_object = new InvitationPass();
                break;
            case PassableType::MEMBERSHIP_PASS;
                $pass_object = new MembershipPass();
                break;
            default:
                throw new InvalidPassableTypeException("Invalid passable type $pass_type, allowed vales are 'Ticket', 'Boarding', 'Invitation' and 'Membership'");
                break;
        }

        return $pass_object;
    }
}