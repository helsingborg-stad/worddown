<?php

declare(strict_types=1);

if (!function_exists('wp_strip_all_tags')) {
    /**
     * Minimal test shim for the WordPress helper used by HtmlProcessor.
     *
     * @param string $text
     * @return string
     */
    function wp_strip_all_tags(string $text): string
    {
        return strip_tags($text);
    }
}

require_once __DIR__ . '/../app/Utilities/HtmlProcessor.php';

use Worddown\Utilities\HtmlProcessor;

/**
 * Assert that two values are identical.
 *
 * @param mixed $expected
 * @param mixed $actual
 * @param string $message
 * @return void
 */
function assertSameValue($expected, $actual, string $message): void
{
    if ($expected !== $actual) {
        throw new RuntimeException($message . PHP_EOL . 'Expected: ' . var_export($expected, true) . PHP_EOL . 'Actual: ' . var_export($actual, true));
    }
}

/**
 * Assert that a condition is true.
 *
 * @param bool $condition
 * @param string $message
 * @return void
 */
function assertTrueCondition(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$processor = new HtmlProcessor();

// Arrange-Act-Assert: invalid UTF-8 should no longer cause a null return or TypeError.
$invalidUtf8Content = "<p>Before</p>\xB1<h2>Heading</h2>";
$cleanedInvalidUtf8Content = $processor->cleanHtmlForMarkdown($invalidUtf8Content);
assertTrueCondition(is_string($cleanedInvalidUtf8Content), 'HtmlProcessor should always return a string for invalid UTF-8 input.');
assertSameValue($invalidUtf8Content, $cleanedInvalidUtf8Content, 'HtmlProcessor should preserve the original content when regex preprocessing fails.');

// Arrange-Act-Assert: valid heading links should still be normalized.
$headingLinkContent = '<a href="https://example.com"><h2>Heading</h2></a>';
$cleanedHeadingLinkContent = $processor->cleanHtmlForMarkdown($headingLinkContent);
assertSameValue('<h2><a href="https://example.com">Heading</a></h2>', $cleanedHeadingLinkContent, 'HtmlProcessor should keep normalizing linked headings.');

echo "HtmlProcessor tests passed.\n";
