<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpCsFixer\Console\Report\FixReport;

use Symfony\Component\Console\Formatter\OutputFormatter;

/**
 * @author Boris Gorbylev <ekho@ekho.name>
 *
 * @internal
 */
final class JsonReporter implements ReporterInterface
{
    /**
     * {@inheritdoc}
     */
    public function getFormat(): string
    {
        return 'json';
    }

    /**
     * {@inheritdoc}
     */
    public function generate(ReportSummary $reportSummary): string
    {
        $jFiles = [];

        foreach ($reportSummary->getChanged() as $file => $fixResult) {
            $jfile = ['name' => $file];

            if ($reportSummary->shouldAddAppliedFixers()) {
                $jfile['appliedFixers'] = $fixResult['appliedFixers'];
            }

            if (!empty($fixResult['diff'])) {
                $jfile['diff'] = $fixResult['diff'];
            }

            $jFiles[] = $jfile;
        }

        $json = [
            'files' => $jFiles,
            'time' => [
                'total' => round($reportSummary->getTime() / 1000, 3),
            ],
            'memory' => round($reportSummary->getMemory() / 1024 / 1024, 3),
        ];

        $json = json_encode($json);

        return $reportSummary->isDecoratedOutput() ? OutputFormatter::escape($json) : $json;
    }
}
