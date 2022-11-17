<?php

namespace Drupal\tiny_html_audio_player\Plugin\Field\FieldFormatter;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Plugin\Field\FieldFormatter\FileMediaFormatterBase;

/**
 * Custom formatter audio fields that leverage tiny-player HTML audio player.
 *
 * @FieldFormatter(
 *   id = "tiny_html_audio_player",
 *   label = @Translation("tiny-player HTML audio player"),
 *   field_types = {
 *     "file"
 *   }
 * )
 */
class TinyHtmlAudioPlayerFormatter extends FileMediaFormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function getMediaType() {
    return 'audio';
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    $source_files = $this->getSourceFiles($items, $langcode);
    if (empty($source_files)) {
      return $elements;
    }

    /** @var \Drupal\file\FileInterface[] $files */
    foreach ($source_files as $delta => $files) {
      $cache_tags = [];
      foreach ($files as $file) {
        $cache_tags = Cache::mergeTags($cache_tags, $file['file']->getCacheTags());
      }
      $elements[$delta][$file['file']->uuid()] = [
        '#type' => 'tiny_html_audio_player',
        '#title' => $items->getParent()->getValue()->label() ?? '',
        '#src' => file_create_url($file['file']->getFileUri()),
        '#src-type' => $file['file']->getMimeType(),
        '#cache' => ['tags' => $cache_tags],
      ];
    }

    return $elements;
  }

}
