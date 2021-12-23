<?php

namespace Tests;

use Faker\Factory;
use PHPUnit\Framework\TestCase;

class wpdmcTest extends TestCase
{
    protected const TARGET_FILTER = 'enable_wp_debug_mode_checks';
    protected const FILTER_PRIORITY = PHP_INT_MAX;
    protected const TARGET_CONSTANT = 'WP_DEBUG_MODE_CHECKS';

    protected function defineConst($value)
    {
        define(static::TARGET_CONSTANT, $value);
    }

    protected function filterReturnVal()
    {
        $filter = $GLOBALS['wp_filter'][static::TARGET_FILTER];
        $function = $filter[static::FILTER_PRIORITY][0]['function'];

        return $function();
    }

    protected function loadWpdmcScript()
    {
        require dirname(__DIR__) . '/src/wp-dmc.php';
    }

    public function provideConstFalsyValues()
    {
        return [
            'bool false' => [false],
            'int zero' => [0],
            'numerical zero' => ['0'],
            'string empty' => [''],
            'null' => [null],
        ];
    }

    public function provideConstTruthyValues()
    {
        return [
            'bool true' => [true],
            'int non-zero' => [rand(1, PHP_INT_MAX)],
            'numerical non-zero' => [strval(rand(1, PHP_INT_MAX))],
            'string not empty' => [Factory::create()->text(10)],
        ];
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function it_defaults_to_true()
    {
        $this->assertTrue($this->filterReturnVal());
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @dataProvider provideConstFalsyValues
     */
    public function it_returns_false_if_specified_constant_is_false_or_falsy($value)
    {
        $this->defineConst($value);

        $this->loadWpdmcScript();

        $this->assertFalse($this->filterReturnVal());
    }

    /**
     * @test
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @dataProvider provideConstTruthyValues
     */
    public function it_returns_true_if_specified_constant_is_true_or_truthy($value)
    {
        $this->defineConst($value);

        $this->loadWpdmcScript();

        $this->assertTrue($this->filterReturnVal());
    }
}
