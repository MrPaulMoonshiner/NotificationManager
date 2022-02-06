<?php

namespace Drupal\notification_manager\Form;

trait TelegramFormElementsTrait {

  public function getTelegramFields() {

    $form['telegram_status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $this->entity->status(),
    ];
    return $form;

  }


}
