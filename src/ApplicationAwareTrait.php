<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

trait ApplicationAwareTrait
{
    /**
     * @var Application
     */
    private $app;

    /**
     * @return Application
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param Application $app
     * @return ApplicationAwareTrait
     */
    public function setApp($app)
    {
        $this->app = $app;
        return $this;
    }
}
