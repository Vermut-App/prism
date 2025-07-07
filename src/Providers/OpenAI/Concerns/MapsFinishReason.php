<?php

declare(strict_types=1);

namespace Prism\Prism\Providers\OpenAI\Concerns;

use Prism\Prism\Enums\FinishReason;
use Prism\Prism\Providers\OpenAI\Maps\FinishReasonMap;

trait MapsFinishReason
{
    /**
     * @param  array<string, mixed>  $data
     */
    protected function mapFinishReason(array $data): FinishReason
    {
        return FinishReasonMap::map(
            data_get($data, 'output.' . (count(data_get($data, 'output')) - 1) . '.status', ''),
            data_get($data, 'output.' . (count(data_get($data, 'output')) - 1) . '.type', ''),
        );
    }
}
