<?php
namespace jzweb\open\weixin\open;

use jzweb\open\weixin\lib\component;


/**
 * 公众号第三方平台-微信用户的一键授权功能
 *
 * @user
 * @date 2017/3/10
 */
class mpAuth
{

    //第三方平台appid
    private $app_id;
    //第三方平台appid对应的密钥
    private $secret;
    //第三方平台组件SDK
    private $component;

    public function __construct($app_id, $secret)
    {
        $this->app_id = $app_id;
        $this->secret = $secret;
        $this->component = new component();
    }

    /**
     * 第一步：获取第三方平台component_access_token
     *
     * @param string $component_verify_ticket 微信后台推送的ticket，此ticket会定时推送，具体请见本页的推送说明
     * @return array
     */
    public function getComponentAccessToken($component_verify_ticket)
    {
        return $this->component->getComponentAccessToken($this->app_id, $this->secret, $component_verify_ticket);
    }


    /**
     * 第二步：第三方平台获取预授权码(pre_auth_code)
     *
     * @param string $component_access_token 第三方平台access_token
     * @return array
     */
    public function getPreAuthCode($component_access_token)
    {
        return $this->component->getPreAuthCode($this->app_id, $component_access_token);
    }

    /**
     * 第三步：引用用户进入授权页
     * 用户确认并同意登录授权第三方平台方
     * 授权后回掉URL,得到授权码(authoriaztion_code)和过期时间
     * 利用授权码调用用户公众号相关API
     * 妥善保管号授权码
     *
     * @param string $pre_auth_code 预授权码
     * @param string $redirect_uri 重定向地址，需要进行UrlEncode
     *
     * @return string
     */
    public function getComponentloginpageUrl($pre_auth_code, $redirect_uri)
    {

        return $this->component->getComponentLoginPage($this->app_id, $pre_auth_code, $redirect_uri);
    }

    /**
     * 第四步：使用授权码换取公众号的接口调用凭据和授权信息
     *
     * @param string $authorization_code 授权code,会在授权成功时返回给第三方平台，详见第三方平台授权流程说明
     * @param string $component_access_token 第三方平台access_token
     * @return array
     */
    public function getQueryAuth($authorization_code, $component_access_token)
    {

        return $this->component->getQueryAuth($this->app_id, $authorization_code, $component_access_token);
    }

    /**
     * 获取（刷新）授权公众号的接口调用凭据（令牌）
     *
     * @param string $authorizer_appid 授权方appid
     * @param string $authorizer_refresh_token 授权方的刷新令牌，刷新令牌主要用于公众号第三方平台获取和刷新已授权用户的access_token，只会在授权时刻提供，请妥善保存。一旦丢失，只能让用户重新授权，才能再次拿到新的刷新令牌
     * @param string $component_access_token 第三方平台access_token
     * @return array
     */
    public function getAuthorizerToken($authorizer_appid, $authorizer_refresh_token, $component_access_token)
    {
        return $this->component->getAuthorizerToken($this->app_id, $authorizer_appid, $authorizer_refresh_token, $component_access_token);
    }

    /**
     * 获取授权方的公众号帐号基本信息
     *
     * @param string $authorizer_appid 授权方appid
     * @param string $component_access_token 第三方平台access_token
     * @return array
     */
    public function getAuthorizerInfo($authorizer_appid, $component_access_token)
    {
        return $this->component->getAuthorizerInfo($this->app_id, $authorizer_appid, $component_access_token);
    }

    /**
     * 获取授权方的选项设置信息
     *
     * @param string $authorizer_appid 授权方appid
     * @param string $option_name 选项名称
     * @param string $component_access_token 第三方平台access_token
     * @return array
     */
    public function getAuthorizerOption($authorizer_appid, $option_name, $component_access_token)
    {
        return $this->component->getAuthorizerOption($this->app_id, $authorizer_appid, $option_name, $component_access_token);
    }

    /**
     * 设置授权方的选项信息
     *
     * @param string $authorizer_appid 授权方appid
     * @param string $option_name 选项名称
     * @param string $option_value 设置的选项值
     * @param string $component_access_token 第三方平台access_token
     * @return array
     */
    public function setAuthorizerOption($authorizer_appid, $option_name, $option_value, $component_access_token)
    {

        return $this->component->setAuthorizerOption($this->app_id, $authorizer_appid, $option_name, $option_value, $component_access_token);
    }

    /**
     * 拉取所有已授权的帐号信息
     *
     * @param $component_access_token
     * @param int $offset
     * @param int $count
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function pullApiGetAuthorizerList($component_access_token, $offset = 0, $count = 100)
    {
        return $this->component->apiGetAuthorizerList($this->app_id, $component_access_token, $offset, $count);
    }

    /**
     * 创建开放平台帐号并绑定公众号/小程序
     *
     * @param $component_access_token
     * @param $appid
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function openCreate($component_access_token, $appid)
    {
        return $this->component->openCreate($component_access_token, $appid);
    }

    /**
     * 将公众号/小程序绑定到开放平台帐号下
     *
     * @param $component_access_token
     * @param $appid
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function openBind($component_access_token, $appid, $open_appid)
    {
        return $this->component->openBind($component_access_token, $appid, $open_appid);
    }

    /**
     * 将公众号/小程序从开放平台帐号下解绑
     *
     * @param $component_access_token
     * @param $appid
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function openUnbind($component_access_token, $appid, $open_appid)
    {
        return $this->component->openUnbind($component_access_token, $appid, $open_appid);
    }

    /**
     * 获取公众号/小程序所绑定的开放平台帐号
     *
     * @param $component_access_token
     * @param $appid
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function openGet($component_access_token, $appid)
    {
        return $this->component->openGet($component_access_token, $appid);
    }
}