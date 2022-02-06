<?php

namespace Drupal\notification_manager\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * @Annotation
 */

class NotificationManagerAnnotation extends Plugin {

  /**
   * id of plugin for search.
   *
   * @var string
   */
  public $id;

}
