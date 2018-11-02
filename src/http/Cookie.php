<?php

namespace mix\http;

use mix\base\Component;

/**
 * Cookie组件
 * @author 刘健 <coder.liu@qq.com>
 */
class Cookie extends Component
{

    // 过期时间
    public $expires = 31536000;

    // 有效的服务器路径
    public $path = '/';

    // 有效域名/子域名
    public $domain = '';

    // 仅通过安全的 HTTPS 连接传给客户端
    public $secure = false;

    // 仅可通过 HTTP 协议访问
    public $httpOnly = false;

    // 初始化事件
    public function onInitialize()
    {
        parent::onInitialize(); // TODO: Change the autogenerated stub
        // 设置协程模式
        $this->setCoroutineMode(Component::COROUTINE_MODE_REFERENCE);
    }

    // 取值
    public function get($name = null)
    {
        return \Mix::app()->request->cookie($name);
    }

    // 赋值
    public function set($name, $value, $expires = null)
    {
        return \Mix::app()->response->setCookie($name, $value, time() + (is_null($expires) ? $this->expires : $expires), $this->path, $this->domain, $this->secure, $this->httpOnly);
    }

    // 判断是否存在
    public function has($name)
    {
        return is_null($this->get($name)) ? false : true;
    }

    // 删除
    public function delete($name)
    {
        return $this->set($name, null, 0);
    }

    // 清空当前域所有cookie
    public function clear()
    {
        foreach (\Mix::app()->request->cookie() as $name => $value) {
            $this->set($name, null, 0);
        }
        return true;
    }

}
