<?php

namespace PassApp\Lib\Passes;

use PassApp\Lib\Passes\Constants\SerialType;
use PassApp\Lib\PassFactory;
use PassApp\PassApp;

/**
 * BasePass which holds the common Passes data and operations
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 */
class BasePass extends PassApp {


    /**
     * @var array   pass details
     */
    private $details;

    /**
     * @var bool    pass status
     * expected values are 'expired' or 'valid'
     */
    private $expired;

    /**
     * @var SerialType  the bar code type
     * expected values are 'qr_code' or 'ean_13'
     */
    private $serial_type;

    /**
     * @var bool    if the pass is transferable or not
     */
    private $transferable;

    /**
     * @var string  if the pass type was 'Memembership'
     * it'll be pending upon user acceptance
     *
     * Any other pass type will have 'accepted=true' by default
     */
    private $accepted;

    /**
     * @var string  pass description
     */
    private $description;

    /**
     * @var string  pass user phone
     */
    private $user_phone;

    /**
     * @var string  pass ower phones
     */
    private $owner_phone;

    /**
     * @var string  pass image url
     */
    private $image_url;

    /**
     * @var ExpirationType  pass expiration type may be by date
     * or by the number of user checkins
     * Expected values are 'date', 'checkins'
     */
    private $expiration_type;

    /**
     * @var integer pass maximum checkins
     * This parameter will be used only if the pass expiration
     * type was set to '$expiration_type=checkins'
     */
    private $checkin_maximum;

    /**
     * @var integer pass checkin count
     */
    private $checkin_count;

    /**
     * @var date    event pass start date
     */
    private $starts_at;

    /**
     * @var date    event pass end date
     */
    private $ends_at;

    /**
     * @var string  venue address
     */
    private $place_address;

    /**
     * @var string  venue longitude
     */
    private $place_longitude;

    /**
     * @var string  venue latitude
     */
    private $place_latitude;

    /**
     * @var string  venue phone
     */
    private $place_phone;

    /**
     * @var string  venue email
     */
    private $place_email;

    /**
     * @var string  venue website
     */
    private $place_website;

    /**
     * @var string  venue twitter account full url
     * @example 'https://twitter.com/AlaaAttya'
     */
    private $place_twitter;

    /**
     * @var string  venue facebook account full url
     * @example 'https://www.facebook.com/alaa.attya'
     */
    private $place_facebook;

    /**
     * @var string  venue name
     */
    private $place_name;

    /**
     * @var array   sponsors logos
     */
    private $sponsors_logos_urls;

    /**
     * @var PassableType    pass types
     * Expected values are 'Ticket', 'Invitation', 'Boarding' or 'Membership'
     */
    protected $passable_type;

    private $parent_id;

    private $event_id;

    public function getInstance($pass_type) {
        return PassFactory::getInstance($pass_type);
    }

    public function setEventId($event_id) {
        $this->event_id = $event_id;
        return $this;
    }

    public function getEventId() {
        return $this->event_id;
    }

    /**
     * Get sponsors logos urls
     *
     * @return array
     */
    public function getSponsorsLogosUrls() {
        return null == $this->sponsors_logos_urls ? array() : $this->sponsors_logos_urls;
    }

    /**
     * Set sponsors logos urls
     *
     * @param array $sponsors_logos_urls
     * @return BasePass
     */
    public function setSponsorsLogosUrls($sponsors_logos_urls) {
        $this->sponsors_logos_urls = $sponsors_logos_urls;
        return $this;
    }

    /**
     * Get pass details
     *
     * @return string
     */
    public function getDetails() {
        return $this->details;
    }

    /**
     * Get expired or not
     *
     * @return bool
     */
    public function getExpired() {
        return $this->expired;
    }

    /**
     * Get serial type
     *
     * @return string   SerialType constant
     */
    public function getSerialType() {
        return null == $this->serial_type ? SerialType::QR : $this->serial_type;
    }

    /**
     * Get if the pass is transferrable
     *
     * @return bool
     */
    public function getTransferable() {
        return null == $this->transferable ? true : $this->transferable;
    }

    /**
     * Get if the pass was accepted or not
     *
     * @return bool
     */
    public function getAccepted() {
        return $this->accepted;
    }

    /**
     * Get pass description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Get pass user phone
     *
     * @return string
     */
    public function getUserPhone() {
        if (11 == strlen($this->user_phone)) {
            return $this->user_phone;
        } else {
            return $this->user_phone;
        }
    }

    /**
     * Get pass owner phone
     */
    public function getOwnerPhone() {
        if (11 == strlen($this->owner_phone)) {
            return $this->owner_phone;
        } else {
            return $this->owner_phone;
        }
    }

    /**
     * Get pass image url
     *
     * @return string
     */
    public function getImageUrl() {
        return null == $this->image_url ? '' : $this->image_url;
    }

    /**
     * Get pass expiration type
     *
     * @return string   ExpirationType constant
     */
    public function getExpirationType() {
        return $this->expiration_type;
    }

    /**
     * Get pass maximum checkin count
     *
     * @return integer
     */
    public function getCheckinMaximum() {
        return $this->checkin_maximum;
    }

    /**
     * Get pass check-in count
     *
     * @return integer
     */
    public function getCheckinCount() {
        return $this->checkin_count;
    }

    /**
     * Get pass start date
     *
     * @return date
     */
    public function getStartsAt() {
        return $this->starts_at;
    }

    /**
     * Get pass end date
     *
     * @return date
     */
    public function getEndsAt() {
        return $this->ends_at;
    }

    /**
     * Get pass event venue address
     *
     * @return string
     */
    public function getPlaceAddress() {
        return $this->place_address;
    }

    /**
     * Get venue longitude
     *
     * @return string
     */
    public function getPlaceLongitude() {
        return $this->place_longitude;
    }

    /**
     * Get venue latitude
     *
     * @return string
     */
    public function getPlaceLatitude() {
        return $this->place_latitude;
    }

    /**
     * Get venue phone
     *
     * @return string
     */
    public function getPlacePhone() {
        return $this->place_phone;
    }

    /**
     * Get venue email
     */
    public function getPlaceEmail() {
        return $this->place_email;
    }

    /**
     * Get venue website
     *
     * @return string
     */
    public function getPlaceWebsite() {
        return $this->place_website;
    }

    /**
     * Get venue twitter account
     *
     * @return string
     */
    public function getPlaceTwitter() {
        return $this->place_twitter;
    }

    /**
     * Get venue facebook account
     *
     * @return string
     */
    public function getPlaceFacebook() {
        return $this->place_facebook;
    }

    /**
     * Get venue name
     *
     * @return string
     */
    public function getPlaceName() {
        return $this->place_name;
    }

    /**
     * Get parent id
     *
     * @return integer
     */
    public function getParentId() {
        return $this->parent_id;
    }

    /**
     * Set pass details
     *
     * @param string $details
     * @return BasePass
     */
    public function setDetails($details) {
        $this->details = $details;
        return $this;
    }

    /**
     * Set pass expiration date
     *
     * @param date $expired
     * @return BasePass
     */
    public function setExpired($expired) {
        $this->expired = $expired;
        return $this;
    }

    /**
     * Set pass serial type
     *
     * @param   string $serial_type
     * @return  BasePass
     */
    public function setSerialType($serial_type) {
        $this->serial_type = $serial_type;
        return $this;
    }

    /**
     * Set pass transferable
     *
     * @param   bool $transferable
     * @return  BasePass
     */
    public function setTransferable($transferable) {
        $this->transferable = $transferable;
        return $this;
    }

    /**
     * Set if pass was accepted or not
     *
     * @param   bool $accepted
     * @return  BasePass
     */
    public function setAccepted($accepted) {
        $this->accepted = $accepted;
        return $this;
    }

    /**
     * Set pass description
     *
     * @param   string $description
     * @return  BasePass
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * Set user phone
     *
     * @param   string  $user_phone
     * @return  BasePass
     */
    public function setUserPhone($user_phone) {
        if ($user_phone[0] == '0') {
            $user_phone = $user_phone;
        }
        $this->user_phone = $user_phone;
        return $this;
    }

    /**
     * Set owner phone
     *
     * @param string $owner_phone
     * @return BasePass
     */
    public function setOwnerPhone($owner_phone) {
        if ($owner_phone[0] == '0') {
            $owner_phone = $owner_phone;
        }
        $this->owner_phone = $owner_phone;
        return $this;
    }

    /**
     * Set pass image url
     *
     * @param string $image_url
     * @return BasePass
     */
    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
        return $this;
    }

    /**
     * Set pass expiration type
     *
     * @param string $expiration_type   it should be an ExpirationType constant
     * its expected values are 'date' or 'checkin'
     * @return BasePass
     */
    public function setExpirationType($expiration_type) {
        $this->expiration_type = $expiration_type;
        return $this;
    }

    /**
     * Set pass maximum checkin count
     *
     * @param integer $checkin_maximum
     * @return BasePass
     */
    public function setCheckinMaximum($checkin_maximum) {
        $this->checkin_maximum = $checkin_maximum;
        return $this;
    }

    /**
     * Set checkin count
     *
     * @param integer $checkin_count
     * @return BasePass
     */
    public function setCheckinCount($checkin_count) {
        $this->checkin_count = $checkin_count;
        return $this;
    }

    /**
     * Set pass start at date
     *
     * @param date $starts_at
     * @return BasePass
     */
    public function setStartsAt($starts_at) {
        $this->starts_at = $starts_at;
        return $this;
    }

    /**
     * Set pass ends at
     *
     * @param date $ends_at
     * @return BasePass
     */
    public function setEndsAt($ends_at) {
        $this->ends_at = $ends_at;
        return $this;
    }

    /**
     * Set venue address
     *
     * @param string $place_address
     * @return BasePass
     */
    public function setPlaceAddress($place_address) {
        $this->place_address = $place_address;
        return $this;
    }

    /**
     * Set venue longitude
     *
     * @param string $place_longitude
     * @return BasePass
     */
    public function setPlaceLongitude($place_longitude) {
        $this->place_longitude = $place_longitude;
        return $this;
    }

    /**
     * Set venue latitude
     *
     * @param string $place_latitude
     * @return BasePass
     */
    public function setPlaceLatitude($place_latitude) {
        $this->place_latitude = $place_latitude;
        return $this;
    }

    /**
     * Set venue phone
     *
     * @param string $place_phone
     * @return BasePass
     */
    public function setPlacePhone($place_phone) {
        $this->place_phone = $place_phone;
        return $this;
    }

    /**
     * Set venue email
     *
     * @param string $place_email
     * @return BasePass
     */
    public function setPlaceEmail($place_email) {
        $this->place_email = $place_email;
        return $this;
    }

    /**
     * Set venue website
     *
     * @param string $place_website
     * @return BasePass
     */
    public function setPlaceWebsite($place_website) {
        $this->place_website = $place_website;
        return $this;
    }

    /**
     * Set venue twitter
     *
     * @param string $place_twitter full twitter url
     * @return BasePass
     */
    public function setPlaceTwitter($place_twitter) {
        $this->place_twitter = $place_twitter;
        return $this;
    }

    /**
     * Set venue facebook account
     *
     * @param string $place_facebook    full facebook url
     * @return BasePass
     */
    public function setPlaceFacebook($place_facebook) {
        $this->place_facebook = $place_facebook;
        return $this;
    }

    /**
     * Set venue name
     *
     * @param string $place_name
     * @return BasePass
     */
    public function setPlaceName($place_name) {
        $this->place_name = $place_name;
        return $this;
    }

    /**
     * Set pass parent id
     * this function will be used for copying fields and create
     * a new pass clone
     *
     * @param string $parent_id
     * @return BasePass
     */
    public function setParentId($parent_id) {
        $this->parent_id = $parent_id;
        return $this;
    }

    /**
     * Load pass array data into Pass Object
     *
     * @param   array $data   pass data array
     * @return  Pass object
     */
    public function load($data) {

        // Validate serial types
        if (!\in_array($data['serial_type'], SerialType::$types)) {
            throw new Exceptions\ParameterMissMatchException('serial_type is not in the list of the allowed types');
        }

        $this->setAccepted(true);
        $this->setExpired(false);
        $this->setParentId(null);
        //$this->setCheckinMaximum($checkin_maximum);

        $this->setDescription($data['description']);

        // Handling the ambiguous seating info object issue
        $details = $data['details'];
        foreach($details as &$detail) {
            if(count($detail['seating_info']) <= 0) {
                $detail['seating_info'] = (object) array();
            }
        }
        $this->setDetails($details);


        $this->setEndsAt($data['ends_at']);
        $this->setExpirationType($data['expiration_type']);
        $this->setImageUrl($data['image_url']);

        $owner_mobile = str_replace("00", "", $data['owner']['phone']);
        $owner_mobile = str_replace("+", "", $data['owner']['phone']);
        $this->setOwnerPhone($owner_mobile);

        $this->setPlaceAddress($data['place_address']);
        $this->setPlaceEmail($data['place_email']);
        $this->setPlaceFacebook($data['place_facebook']);
        $this->setPlaceLatitude($data['place_latitude']);
        $this->setPlaceLongitude($data['place_longitude']);
        $this->setPlaceName('');

        $place_phone = str_replace("00", "", $data['place_phone']);
        $place_phone = str_replace("+", "", $data['place_phone']);
        $this->setPlacePhone($place_phone);

        $this->setPlaceTwitter($data['place_twitter']);
        $this->setPlaceWebsite($data['place_website']);
        $this->setSerialType($data['serial_type']);
        $this->setStartsAt($data['starts_at']);

        $user_phone = str_replace("00", "", $data['user']['phone']);
        $user_phone = str_replace("+", "", $data['user']['phone']);
        $this->setUserPhone($user_phone);

        $this->setSponsorsLogosUrls($data['sponsors_logos_urls']);


        $event_id = '';
        if(isset($data['event']['id'])) {
            $event_id = $data['event']['id'];
        }
        $this->setEventId($event_id);
    }

    /**
     * Convert Pass Object to array
     *
     * @return  array    pass data array
     */
    public function toArray() {

        $pass_array = array(
            //'parent_id' => $this->getParentId(),
            'accepted' => $this->getAccepted(),
            //'checkin_count' => $this->getCheckinCount(),
            'description' => $this->getDescription(),
            //'checkin_maximum' => $this->getCheckinMaximum(),
            'details' => $this->getDetails(),
            'ends_at' => $this->getEndsAt(),
            'expiration_type' => $this->getExpirationType(),
            'expired' => $this->getExpired(),
            'image_url' => $this->getImageUrl(),
            'sponsors_logos_urls' => $this->getSponsorsLogosUrls(),
            'owner_phone' => $owner_phone,
            'place_address' => $this->getPlaceAddress(),
            'place_email' => $this->getPlaceEmail(),
            'place_facebook' => $this->getPlaceFacebook(),
            'place_latitude' => $this->getPlaceLatitude(),
            'place_longitude' => $this->getPlaceLongitude(),
            'place_name' => $this->getPlaceName(),
            'place_phone' => $this->getPlacePhone(),
            'place_twitter' => $this->getPlaceTwitter(),
            'place_website' => $this->getPlaceWebsite(),
            'serial_type' => $this->getSerialType(),
            'starts_at' => $this->getStartsAt(),
            'transferable' => $this->getTransferable(),
            'user_phone' => $user_phone,
            'event_id' => $this->getEventId()
        );

        if (null != $this->getParentId()) {
            $pass_array['parent_id'] = $this->getParentId();
        }

        if (ExpirationType::Checkins == $this->getExpirationType()) {
            $pass_array['checkin_maximum'] = $this->getCheckinMaximum();
            $pass_array['checkin_count'] = null == $this->getCheckinCount() ? 0 : $this->getCheckinCount();
        }

        return $pass_array;
    }
}