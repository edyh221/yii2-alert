<?php 

namespace edyh221\alert;

use Yii;

class Alert extends \yii\base\Widget
{
  public function init()
  {
    parent::init();

    echo match (true) {
      Yii::$app->session->hasFlash('success') => $this->_message('success'),
      Yii::$app->session->hasFlash('error') => $this->_message('error'),
    }
  }

  protected function _message(string $type): string 
  {
    return '<div class="alert alert-'. $type .'">'. Yii::$app->session->getFlash($type) . '</div>';
  }
}