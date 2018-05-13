<?php

namespace mix\validators;

/**
 * IntegerValidator类
 * @author 刘健 <coder.liu@qq.com>
 */
class IntegerValidator extends BaseValidator
{

    // 允许的功能集合
    protected $_allowActions = ['type', 'unsigned', 'min', 'max', 'length', 'minLength', 'maxLength'];

    // 类型验证
    protected function type()
    {
        $value = $this->_attributeValue;
        if (!Validate::isInteger($value)) {
            if (is_null($this->attributeMessage)) {
                $error = "{$this->attributeLabel}只能为整数.";
            } else {
                $error = $this->attributeMessage;
            }
            $this->errors[] = $error;
            return false;
        }
        return true;
    }

}
