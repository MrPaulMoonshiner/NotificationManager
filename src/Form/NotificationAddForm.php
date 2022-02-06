<?php

namespace Drupal\notification_manager\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;


class NotificationAddForm  extends EntityForm{

  use TelegramFormElementsTrait;
  use SMSFormElementsTrait;
  use DBFormElementsTrait;
  use SlackFormElementsTrait;

  public function form(array $form, FormStateInterface $form_state) {

    $form = parent::form($form, $form_state);

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $this->entity->label(),
      '#description' => $this->t('Label for the notification.'),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $this->entity->id(),
      '#machine_name' => [
        'exists' => '\Drupal\notification_manager\Entity\NotificationConfigurationEntity::load',
      ],
      '#disabled' => !$this->entity->isNew(),
    ];

    $form['status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $this->entity->status(),
    ];

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#default_value' => $this->entity->get('description'),
      '#description' => $this->t('Description of the notification.'),
    ];
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#default_value' => $this->entity->get('message'),
      '#description' => $this->t('Message of the notification.'),
    ];
    $form['channels'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Available channels'),
      '#default_value' => $this->entity->get('channels'),
      '#options' => [
        'telegram' => 'Telegram',
        'sms' => 'SMS',
        'slack' => 'Slack',
        'db' => 'Database',
        ],
      '#description' => $this->t('Channels that you can send messages to'),
    ];

    $form['telegram'] = [
      '#title' => t('For telegram sending, please fill fields:'),
      '#type' => 'fieldset',
      '#states' => [
        'visible' => [
          ':input[name="channels[telegram]"]' => [
            ['checked' => TRUE],
          ],
        ],
      ],
    ];
    $form['telegram'] += $this->getTelegramFields();

    $form['sms'] = [
      '#title' => t('For telegram SMS, please fill fields:'),
      '#type' => 'fieldset',
      '#states' => [
        'visible' => [
          ':input[name="channels[sms]"]' => [
            ['checked' => TRUE],
          ],
        ],
      ],
    ];
    $form['sms'] += $this->getSMSFields();

    $form['slack'] = [
      '#title' => t('For Slack sending, please fill fields:'),
      '#type' => 'fieldset',
      '#states' => [
        'visible' => [
          ':input[name="channels[slack]"]' => [
            ['checked' => TRUE],
          ],
        ],
      ],
    ];
    $form['slack'] += $this->getSlackFields();

    $form['db'] = [
      '#title' => t('For Database sending, please fill fields:'),
      '#type' => 'fieldset',
      '#states' => [
        'visible' => [
          ':input[name="channels[db]"]' => [
            ['checked' => TRUE],
          ],
        ],
      ],
    ];
    $form['db'] += $this->getDBFields();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);
    $message_args = ['%label' => $this->entity->label()];
    $message = $result == SAVED_NEW
      ? $this->t('Created new notification %label.', $message_args)
      : $this->t('Updated notification %label.', $message_args);
    $this->messenger()->addStatus($message);
    $form_state->setRedirectUrl($this->entity->toUrl('collection'));
    return $result;
  }
}
