<?php

namespace Commands;

use PHPUnit\Framework\TestCase;
use GeekBrains\LevelTwo\Blog\Commands\Arguments;

class ArgumentsTest extends TestCase
{
    public function testItReturnsArgumentsValueByName(): void
    {
    // Подготовка
    $arguments = new Arguments(['some_key' => 'some_value']);
    // Действие
    $value = $arguments->get('some_key');
    // Проверка
    $this->assertEquals('some_value', $value);
    }

}