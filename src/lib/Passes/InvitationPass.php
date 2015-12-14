<?php
/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 03/12/15
 * Time: 10:06 م
 */

namespace PassApp\Lib\Passes;


class InvitationPass extends BasePass implements PassInterface {

    /**
     * Set the passable type to be 'Ticket' by default
     * for Event passes
     */
    public function __construct() {
        $this->passable_type = PassableType::Invitation;
        $this->setAccepted(true);
        $this->setExpired(false);
        $this->setParentId(null);
    }

    /**
     * Get passable type
     *
     * @return string
     */
    private function getPassableType(){
        return $this->passable_type;
    }

    /**
     * @var string passable attributes title
     */
    private $title;

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
     * Get passable title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
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
    public function toArray($bulk = false) {
        $pass_array = parent::toArray();
        $passable_attaributes = array(
            "title" => $this->getTitle(),
            "icon" => $this->getIcon(),
            "event_name" => $this->getEventName(),
            "description" => $this->getDescription()
        );
        $pass_array['passable_type'] = $this->getPassableType();
        $pass_array['passable_attributes'] = $passable_attaributes;
        if(true === $bulk) {
            return $pass_array;
        }
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
        $this->setIcon($data['passable_attributes']['icon']);
        $this->setEventName($data['passable_attributes']['event_name']);
        $this->setDescription($data['passable_attributes']['description']);
        return $this;
    }

    public function create($data) {
        // TODO: Implement create() method.
    }

    public function update($pass_id, $data) {
        // TODO: Implement update() method.
    }

    public function delete($pass_id) {
        // TODO: Implement delete() method.
    }
}