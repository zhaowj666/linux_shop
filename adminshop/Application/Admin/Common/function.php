<?php

/**
 * @param $model
 */
function error_msg($model)
{
//错误信息
    $errors = $model->getError();
    $errorMsg = '<ul>';
    //判断错误数据是否为数组
    if (is_array($errors)) {
        foreach ($errors as $error) {
            $errorMsg .= "<li>$error</li>";
        }
    } else {
        $errorMsg .= "<li>$errors</li>";
    }
    $errorMsg .= '</ul>';
    //返回错误信息
    return $errorMsg;
}
