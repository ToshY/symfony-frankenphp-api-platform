<?php

declare(strict_types=1);

use ComposerUnused\ComposerUnused\Configuration\Configuration;
use ComposerUnused\ComposerUnused\Configuration\ConfigurationSet\SymfonyConfigurationSet;
use ComposerUnused\ComposerUnused\Configuration\NamedFilter;
use ComposerUnused\ComposerUnused\Configuration\PatternFilter;

return static function (Configuration $config): Configuration {
    $config->applyConfigurationSet(new SymfonyConfigurationSet('__root__'))
        ->addNamedFilter(NamedFilter::fromString('runtime/frankenphp-symfony'))
        ->addPatternFilter(PatternFilter::fromString('/ext-.*/'))
        ->addPatternFilter(PatternFilter::fromString('/symfony\/.*/'));

    return $config;
};
