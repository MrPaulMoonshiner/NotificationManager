<?php

namespace Drupal\notification_manager\Form;

trait DBFormElementsTrait {

  public function getDBFields() {

    $form['db_status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $this->entity->status(),
    ];
    return $form;

  }


}
