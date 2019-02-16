<?php

namespace Drupal\button_link\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\link\Plugin\Field\FieldFormatter\LinkFormatter;

/**
 * Plugin implementation of the 'button_link' formatter.
 *
 * @FieldFormatter(
 *   id = "button_link",
 *   label = @Translation("Button Link"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class ButtonLinkFormatter extends LinkFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    // Let LinkFormatter generate the element
    $elements = parent::viewElements($items, $langcode);

    // Add the .button class to each link.
    foreach ($elements as &$item) {
      if (isset($item['#url']))
        $item['#url']->setOption('attributes', [
          'class' => 'button'
        ]);
    }

    return $elements;
  }
}
