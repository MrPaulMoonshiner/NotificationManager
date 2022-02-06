<?php

namespace Drupal\notification_manager;

use Drupal\Component\Plugin\Factory\DefaultFactory;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

class NotificationManagerPluginManager extends DefaultPluginManager {
  /**
   * {@inheritdoc}
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct(
      'Plugin/Notification',
      $namespaces,
      $module_handler,
      'Drupal\notification_manager\NotificationManagerPluginInterface',
      'Drupal\notification_manager\Annotation\NotificationManagerAnnotation'
    );

    $this->alterInfo('notification_manager_info');
    $this->setCacheBackend($cache_backend, 'notification_manager');
    $this->factory = new DefaultFactory($this->getDiscovery());
  }
}
