<?php

$finder = (new PhpCsFixer\Finder())
        ->in(__DIR__ . "/src")
        ->exclude('var')
        ->exclude('vendor')
;
return (new PhpCsFixer\Config())
                ->setRules([
                    '@Symfony' => true,
                ])
                ->setRiskyAllowed(false)
                ->setFinder($finder)
;
