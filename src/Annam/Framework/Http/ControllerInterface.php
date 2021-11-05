<?php

declare(strict_types=1);

namespace Annam\Framework\Http;

use Annam\FRamework\Http\Response\Raw;

interface ControllerInterface
{
    public function execute(): Raw;
}
