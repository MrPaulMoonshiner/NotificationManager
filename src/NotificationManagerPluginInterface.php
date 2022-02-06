<?php

namespace Drupal\notification_manager;

interface NotificationManagerPluginInterface {

  /**
   * Gets if of plugin.
   */
  public function getId();

  /**
   * Preparing object of notification before send.
   */
  public function getNotification();

  /**
   * Gets notification that was created as config.
   */
  public function loadConfig($sting_config = '');

  /**
   * Sends notification to endpoint.
   */
  public function sendNotification();

}
