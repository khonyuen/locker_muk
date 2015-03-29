<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
//Yii::setAlias('khonyuen',dirname(dirname(__DIR__)));

Yii::setAlias('@foo', '/path/to/foo');
Yii::setAlias('@foo/bar', '/path2/bar');
/**
 *  aliase @foo = /path/to/foo
 *  ถ้าไม่ได้ประกาศ @foo/bar ไว้ ระบบจะไปเรียก @foo แทน โดยมองว่า bar นั้น เป็น path ไม่ใช่ alias
 */
