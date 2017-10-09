<?php

declare(strict_types=1);

/*
 * This file is part of the Nexylan packages.
 *
 * (c) Nexylan SAS <contact@nexylan.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nexy\Gandi\Api;

use Nexy\Gandi\Gandi;

/**
 * @author Jérôme Pogeant <p-jerome@hotmail.fr>
 */
abstract class AbstractApi
{
    /**
     * @var Gandi
     */
    protected $gandi;

    /**
     * @param Gandi $gandi
     */
    public function __construct(Gandi $gandi)
    {
        $this->gandi = $gandi;
    }
}
