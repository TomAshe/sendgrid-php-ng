<?php
/**
 * Created by PhpStorm.
 * User: bowens
 * Date: 8/13/17
 * Time: 23:27
 */

namespace Fastglass\SendGrid;


class Content implements \JsonSerializable {

  private $type;

  private $value;

  public function __construct($type, $value) {
    $this->type = $type;
    $this->value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
  }

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }

  public function setValue($value) {
    $this->value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
  }

  public function getValue() {
    return $this->value;
  }

  public function jsonSerialize() {
    return array_filter(
      [
        'type' => $this->getType(),
        'value' => $this->getValue(),
      ],
      function ($value) {
        return $value !== NULL;
      }
    ) ?: NULL;
  }
}