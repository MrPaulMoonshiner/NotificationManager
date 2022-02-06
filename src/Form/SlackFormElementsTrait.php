<?php

namespace Drupal\notification_manager\Form;

trait SlackFormElementsTrait {

  public function getSlackFields() {

    $form['slack_status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $this->entity->status(),
    ];
    return $form;

  }


}
