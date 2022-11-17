<?php

namespace Drupal\Tests\copyright_footer\Functional;

use DateTime;
use Drupal\block\Entity\Block;
use Drupal\Component\Utility\Html;
use Drupal\copyright_footer\Plugin\Block\CopyrightFooter;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Tests\BrowserTestBase;

/**
 * Test case for a Copyright Footer block.
 *
 * @group Copyright Footer
 */
class CopyrightFooterTest extends BrowserTestBase {

  use StringTranslationTrait;

  /**
   * The profile to install as a basis for testing.
   *
   * @var string
   */
  protected $profile = 'minimal';

  /**
   * Modules to enable.
   *
   * @var array
  */
  protected static $modules = [
    'copyright_footer',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Permissions.
   *
   * @var array
   */
  protected array $perms = [
    'access content',
    'administer blocks',
  ];

  /**
   * A node.
   *
   * @var \Drupal\node\Entity\Node
   */
  public const ORGANIZATION_URL = 'https://www.drupal.org/';

  /**
   * A version URL.
   *
   * @var string
   */
  public const VERSION_URL = 'https://www.drupal.org/project/copyright_footer';

  /**
   * A year of the origin.
   *
   * @var string
   */
  public string $year_origin = '2018';

  /**
   * A year to date.
   *
   * @var string
   */
  public string $year_to_date = '2038';

  /**
   * A organization name.
   *
   * @var string
   */
  protected string $organization_name = 'Copyright Footer';

  /**
   * A year.
   *
   * @var string
   */
  protected string $year;

  /**
   * A node.
   *
   * @var \Drupal\node\Entity\Node
   */
  protected $node;

  /**
   * A URL of the node.
   *
   * @var string
   */
  protected string $node_url= '';

  /**
   * Set up test.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   * @throws \Exception
   */
  protected function setUp(): void {
    parent::setUp();

    $user = $this->drupalCreateUser($this->perms);
    $this->drupalLogin($user);

    // Create a dummy node.
    $this->createContentType(['type' => 'page']);
    $this->node = $this->drupalCreateNode();

    // Setup configuration dummy data.
    $this->organization_name = $this->randomString();
    $this->year = (new DateTime())->format('Y');
    $this->year_origin = $this->year - random_int(1, 50);
    $this->year_to_date = (int) $this->year + random_int(1, 2038 - (int) $this->year);
    $this->node_url = "/node/{$this->node->id()}";
  }

  /**
   * Test the copyright footer black.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testConfigurationAllBlank(): void {

    // Place a Copyright footer block - All blank.
    $block = $this->placeCopyrightFooterBlock();
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains("Copyright © {$this->year}");
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Organization name only.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testOrganizationNameOnly(): void {

    // Place a Copyright footer block - Organization name only.
    $block = $this->placeCopyrightFooterBlock([
      'organization_name' => $this->organization_name,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()
      ->pageTextContains("© {$this->year} {$this->organization_name}");
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Organization w/ URL.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testOrganizationWithURL(): void {
    $block = $this->placeCopyrightFooterBlock([
      'organization_name' => $this->organization_name,
      'organization_url' => self::ORGANIZATION_URL,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()
      ->pageTextContains(strip_tags($this->t("© {$this->year} {$this->organization_name}", [
        '@year' => $this->year,
        '@organization_name' => Html::escape($this->organization_name),
      ])));

    $this->clickLink($this->organization_name);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->linkExists('Why Drupal?');
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Year origin only.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testYearOriginOnly(): void {

    $block = $this->placeCopyrightFooterBlock([
      'year_origin' => $this->year_origin,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()
      ->pageTextContains("Copyright © {$this->year_origin}-{$this->year}");
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Year origin only (current year).
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testCurrentYearAsOriginOnly(): void {

    $date = new DateTime();
    $current_year_origin = $date->format('Y');
    $block = $this->placeCopyrightFooterBlock([
      'year_origin' => $current_year_origin,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()
      ->pageTextContains("Copyright © {$current_year_origin}");
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Year origin and year to date.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testYearOrginAndYearToDate(): void {
    $block = $this->placeCopyrightFooterBlock([
      'year_origin' => $this->year_origin,
      'year_to_date' => $this->year_to_date,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()
      ->pageTextContains("Copyright © {$this->year_origin}-{$this->year_to_date}");
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Version only.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testVersionOnly(): void {

    // Place a Copyright footer block - Version only.
    $block = $this->placeCopyrightFooterBlock([
      'version' => CopyrightFooter::VERSION,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $version = CopyrightFooter::VERSION;
    $this->assertSession()
      ->pageTextContains("Copyright © {$this->year} ver.$version");
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Version w/ URL.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testVersionWithURL(): void {

    $block = $this->placeCopyrightFooterBlock([
      'version' => CopyrightFooter::VERSION,
      'version_url' => self::VERSION_URL,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $version = CopyrightFooter::VERSION;
    $this->assertSession()
      ->pageTextContains("Copyright © {$this->year} ver.$version");
    $this->clickLink(CopyrightFooter::VERSION);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('Copyright Footer');
    $block->delete();
  }

  /**
   * Place a Copyright footer block - Full parameters.
   *
   * @throws \Behat\Mink\Exception\ExpectationException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function testFullParameters(): void {

    $block = $this->placeCopyrightFooterBlock([
      'organization_name' => $this->organization_name,
      'organization_url' => self::ORGANIZATION_URL,
      'year_origin' => $this->year_origin,
      '@year_to_date' => $this->year_to_date,
      'version' => CopyrightFooter::VERSION,
      'version_url' => self::VERSION_URL,
    ]);
    $this->drupalGet($this->node_url);
    $this->assertSession()->statusCodeEquals(200);
    $version = CopyrightFooter::VERSION;
    $this->assertSession()->pageTextContains("© {$this->year_origin}-{$this->year} {$this->organization_name} ver.$version");

    $this->clickLink($this->organization_name);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->linkExists('Why Drupal?');

    $this->drupalGet($this->node_url);
    $this->clickLink(CopyrightFooter::VERSION);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('Copyright Footer');
    $block->delete();
  }

  /**
   * Create a Copyright Footer block.
   *
   * @return \Drupal\block\Entity\Block
   *   The Copyright Footer block object.
   */
  private function placeCopyrightFooterBlock($settings = []): Block {
    return $this->drupalPlaceBlock('copyright_footer', [
      'organization_name' => $settings['organization_name'] ?? '',
      'organization_url' => $settings['organization_url'] ?? '',
      'year_origin' => $settings['year_origin'] ?? '',
      'year_to_date' => $settings['year_to_date'] ?? '',
      'version' => $settings['version'] ?? '',
      'version_url' => $settings['version_url'] ?? '',
    ]);
  }

}
