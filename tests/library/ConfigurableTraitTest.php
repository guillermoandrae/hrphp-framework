<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HrphpTest;

class ConfigurableTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Hrphp\ConfigurableTrait
     */
    protected $configurableObject;

    public function testGetSetOptions()
    {
        $expectedOptions = [ 'foo' => 'bar', 'learn' => 'to swim' ];
        $this->getConfigurableObject()->setOptions($expectedOptions);
        $this->assertSame($expectedOptions, $this->getConfigurableObject()->getOptions());
    }

    public function testGetSetOption()
    {
        $expectedOptionName = 'foo';
        $expectedOptionValue = 'bar';
        $this->getConfigurableObject()->setOption($expectedOptionName, $expectedOptionValue);
        $this->assertSame($expectedOptionValue, $this->getConfigurableObject()->getOption($expectedOptionName));
    }

    protected function setUp()
    {
        $this->configurableObject = $this->getMockForTrait('\Hrphp\ConfigurableTrait');
    }

    /**
     * @return \Hrphp\ConfigurableTrait
     */
    protected function getConfigurableObject()
    {
        return $this->configurableObject;
    }
}
