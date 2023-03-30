<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v12/common/criterion_category_availability.proto

namespace Google\Ads\GoogleAds\V12\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information about which locales a category is available in.
 *
 * Generated from protobuf message <code>google.ads.googleads.v12.common.CriterionCategoryLocaleAvailability</code>
 */
class CriterionCategoryLocaleAvailability extends \Google\Protobuf\Internal\Message
{
    /**
     * Format of the locale availability. Can be LAUNCHED_TO_ALL (both country and
     * language will be empty), COUNTRY (only country will be set), LANGUAGE (only
     * language wil be set), COUNTRY_AND_LANGUAGE (both country and language will
     * be set).
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.CriterionCategoryLocaleAvailabilityModeEnum.CriterionCategoryLocaleAvailabilityMode availability_mode = 1;</code>
     */
    protected $availability_mode = 0;
    /**
     * Code of the country.
     *
     * Generated from protobuf field <code>optional string country_code = 4;</code>
     */
    protected $country_code = null;
    /**
     * Code of the language.
     *
     * Generated from protobuf field <code>optional string language_code = 5;</code>
     */
    protected $language_code = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $availability_mode
     *           Format of the locale availability. Can be LAUNCHED_TO_ALL (both country and
     *           language will be empty), COUNTRY (only country will be set), LANGUAGE (only
     *           language wil be set), COUNTRY_AND_LANGUAGE (both country and language will
     *           be set).
     *     @type string $country_code
     *           Code of the country.
     *     @type string $language_code
     *           Code of the language.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V12\Common\CriterionCategoryAvailability::initOnce();
        parent::__construct($data);
    }

    /**
     * Format of the locale availability. Can be LAUNCHED_TO_ALL (both country and
     * language will be empty), COUNTRY (only country will be set), LANGUAGE (only
     * language wil be set), COUNTRY_AND_LANGUAGE (both country and language will
     * be set).
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.CriterionCategoryLocaleAvailabilityModeEnum.CriterionCategoryLocaleAvailabilityMode availability_mode = 1;</code>
     * @return int
     */
    public function getAvailabilityMode()
    {
        return $this->availability_mode;
    }

    /**
     * Format of the locale availability. Can be LAUNCHED_TO_ALL (both country and
     * language will be empty), COUNTRY (only country will be set), LANGUAGE (only
     * language wil be set), COUNTRY_AND_LANGUAGE (both country and language will
     * be set).
     *
     * Generated from protobuf field <code>.google.ads.googleads.v12.enums.CriterionCategoryLocaleAvailabilityModeEnum.CriterionCategoryLocaleAvailabilityMode availability_mode = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setAvailabilityMode($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V12\Enums\CriterionCategoryLocaleAvailabilityModeEnum\CriterionCategoryLocaleAvailabilityMode::class);
        $this->availability_mode = $var;

        return $this;
    }

    /**
     * Code of the country.
     *
     * Generated from protobuf field <code>optional string country_code = 4;</code>
     * @return string
     */
    public function getCountryCode()
    {
        return isset($this->country_code) ? $this->country_code : '';
    }

    public function hasCountryCode()
    {
        return isset($this->country_code);
    }

    public function clearCountryCode()
    {
        unset($this->country_code);
    }

    /**
     * Code of the country.
     *
     * Generated from protobuf field <code>optional string country_code = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setCountryCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->country_code = $var;

        return $this;
    }

    /**
     * Code of the language.
     *
     * Generated from protobuf field <code>optional string language_code = 5;</code>
     * @return string
     */
    public function getLanguageCode()
    {
        return isset($this->language_code) ? $this->language_code : '';
    }

    public function hasLanguageCode()
    {
        return isset($this->language_code);
    }

    public function clearLanguageCode()
    {
        unset($this->language_code);
    }

    /**
     * Code of the language.
     *
     * Generated from protobuf field <code>optional string language_code = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguageCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->language_code = $var;

        return $this;
    }

}

