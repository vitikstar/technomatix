<?php

namespace app\models;


class GoodsHistoryOperation
{
    const OPERATION_DELETED = 1;
    const OPERATION_CREATE = 2;
    const OPERATION_UPDATE = 3;

    public static function getOperation()
    {
        return [
            self::OPERATION_DELETED => 'Видалення',
            self::OPERATION_CREATE => 'Створення',
            self::OPERATION_UPDATE => 'Оновлення'
        ];
    }
}
