<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

/**
 * Controller Abstract
 * @package Hrphp
 * @author Guillermo A. Fisher <me@guillermoandraefisher.com>
 */
abstract class ControllerAbstract
{
    use ApplicationAwareTrait;

    /**
     * @param Application $app
     */
    final public function __construct(Application $app)
    {
        $this->setApp($app);
    }

    /**
     * @return mixed
     */
    abstract public function __invoke();
}
