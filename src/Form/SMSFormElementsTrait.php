<?php

namespace Drupal\notification_manager\Form;

trait SMSFormElementsTrait {

  public function getSMSFields() {

    $form['sms_status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $this->entity->status(),
    ];
    return $form;

  }


}
