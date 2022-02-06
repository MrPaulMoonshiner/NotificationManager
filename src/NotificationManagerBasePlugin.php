<?php

namespace Drupal\notification_manager;

use Drupal\Component\Plugin\PluginBase;
use Drupal\notification_manager\NotificationManagerPluginInterface;

class NotificationManagerBasePlugin extends PluginBase implements NotificationManagerPluginInterface{

  /**
   * {@inheritDoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritDoc}
   */
  public function getId() {
    return $this->pluginDefinition['id'];
  }

  /**
   * {@inheritDoc}
   */
  public function getNotification() {
    return '';
  }

  /**
   * {@inheritDoc}
   */
  public function loadConfig($sting_config = '') {
    return '';
  }

  /**
   * {@inheritDoc}
   */
  public function sendNotification() {
    // TODO: Implement sendNotification() method.
  }


}
