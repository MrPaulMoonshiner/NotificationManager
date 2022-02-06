<?php

namespace Drupal\notification_manager\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\notification_manager\NotificationConfigurationInterface;

/**
 * Defines the  notification configuration entity.
 *
 * @ConfigEntityType(
 *   id = "notification_manager_config",
 *   label = @Translation("Notification"),
 *   label_collection = @Translation("Created notifications"),
 *   label_singular = @Translation("Notification"),
 *   label_plural = @Translation("Notifications"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Notification",
 *     plural = "@count Notifications",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\notification_manager\Controller\ConfigNotificationListBuilder",
 *     "form" = {
 *       "add" = "Drupal\notification_manager\Form\NotificationAddForm",
 *       "edit" = "Drupal\notification_manager\Form\NotificationAddForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     }
 *   },
 *   config_prefix = "config",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "status",
 *     "description",
 *     "message",
 *     "endpoint_reference",
 *     "endpoint_data",
 *     "channels",
 *     "telegram",
 *     "sms",
 *     "slack",
 *     "db",
 *   },
 *   links = {
 *     "collection" = "/admin/config/system/notification-config",
 *     "edit-form" = "/admin/config/system/example/{id}",
 *     "delete-form" = "/admin/config/system/example/{id}",
 *   }
 * )
 */

 class NotificationConfigurationEntity extends ConfigEntityBase implements NotificationConfigurationInterface {

  /**
   * @var string
   */
  protected  $message;

  /**
   * @var string
   */
  protected  $id;

  /**
   * @var bool
   */
  protected $status;

  /**
   * @var string
   */
  protected  $description;

  /**
   * @var array
   */
  protected  $channels;


   /**
    * {@inheritDoc}
    */
  public function getMessage(): string {
   return $this->message;
  }

   /**
    * {@inheritDoc}
    */
   public function getChannels(): array {
     return $this->channels;
   }


 }
