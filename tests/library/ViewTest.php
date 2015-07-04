<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HrphpTest;

use Hrphp\View;

class ViewTest extends \PHPUnit_Framework_TestCase
{
    private $view;

    public function testGetSetData()
    {
        $expectedData = [ 'numbers' => [ 1, 2, 3 ] ];
        $this->getView()->setData($expectedData);
        static::assertSame($expectedData, $this->getView()->getData());
    }

    protected function setUp()
    {
        $this->view = new View();
    }

    protected function getView()
    {
        return $this->view;
    }
}