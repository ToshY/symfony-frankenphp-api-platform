<?php

$finder = (new PhpCsFixer\Finder())
    ->exclude([__DIR__ . '/vendor', __DIR__ . '/var'])
    ->in(__DIR__ . '/src')
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@PSR12' => true,
        'single_line_throw' => false,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'concat_space' => [
            'spacing' => 'one',
        ],
        'trailing_comma_in_multiline' => [
            'elements' => [
                'arguments',
                'arrays',
                'match',
                'parameters',
            ],
        ],
        'no_unused_imports' => true,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
        'phpdoc_align' => [
            'align' => 'left',
        ],
        'phpdoc_to_comment' => [
            'ignored_tags' => [
                'see',
            ],
        ],
        'global_namespace_import' => false,
    ])->setFinder($finder);
