<?php

namespace Drupal\notification_manager;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

interface NotificationConfigurationInterface extends ConfigEntityInterface {

  /**
   * To get string message.
   *
   * @return string
   */
  public function getMessage(): string;

  /**
   * To get array of channels that you can send messages to.
   *
   * @return array
   */
  public function getChannels(): array;


}
