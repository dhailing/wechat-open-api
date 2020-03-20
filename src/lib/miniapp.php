<?php


namespace jzweb\open\weixin\lib;


use jzweb\open\weixin\lib\core\http;

class miniapp
{
    //基础信息
    private $fastregisterweappUrl = "https://api.weixin.qq.com/cgi-bin/component/fastregisterweapp?action=create&component_access_token=%s";        //快速创建小程序 post
    private $accountGetaccountbasicinfoUrl = "https://api.weixin.qq.com/cgi-bin/account/getaccountbasicinfo?access_token=%s";                       //获取基本信息 get
    private $wxaModifyDomainUrl = "https://api.weixin.qq.com/wxa/modify_domain?access_token=%s";                                                    //设置服务器域名 post
    private $wxaSetwebviewdomainUrl = "https://api.weixin.qq.com/wxa/setwebviewdomain?access_token=%s";                                             //设置业务域名 post
    private $wxaSetnicknameUrl = "https://api.weixin.qq.com/wxa/setnickname?access_token=%s";                                                       //设置名称 post
    private $wxaverfyCheckwxverifynickanmeUrl = "https://api.weixin.qq.com/cgi-bin/wxverify/checkwxverifynickname?access_token=%s";                 //微信认证名称检测 post
    private $wxaApiWxaQuerynickanmeUrl = "https://api.weixin.qq.com/wxa/api_wxa_querynickname?access_token=%s";                                     //微信认证名称检测 post
    private $accountModifyheadimageUrl = "https://api.weixin.qq.com/cgi-bin/account/modifyheadimage?access_token=%s";                               //修改头像 post
    private $accountModifysignatureUrl = "https://api.weixin.qq.com/cgi-bin/account/modifysignature?access_token=%s";                               //修改功能介绍 post
    private $wxaGetwxasearchstatusUrl = "https://api.weixin.qq.com/wxa/getwxasearchstatus?access_token=%s";                                         //查询隐私设置 post
    private $wxaChangewxasearchstatusUrl = "https://api.weixin.qq.com/wxa/changewxasearchstatus?access_token=%s";                                   //修改隐私设置 post

    //类目管理

    //扫码关注组件

    //普通链接二维码

    //成员管理

    //代码模板库设置

    //代码管理

    //模板消息

    //订阅消息


    /**
     * 快速创建小程序
     *
     * @param $component_access_token
     * @param $name 企业名
     * @param $code 企业代码
     * @param $code_type 企业代码类型（1：统一社会信用代码， 2：组织机构代码，3：营业执照注册号）
     * @param $legal_persona_wechat 法人微信
     * @param $legal_persona_name 法人姓名
     * @param $component_phone 第三方联系电话
     * @return core\mix
     */
    public function fastregisterweapp($component_access_token, $name, $code, $code_type, $legal_persona_wechat, $legal_persona_name, $component_phone)
    {
        $url = sprintf($this->fastregisterweappUrl, $component_access_token);
        $postData = [
            'name' => $name,
            'code' => $code,
            'code_type' => $code_type,
            'legal_persona_wechat' => $legal_persona_wechat,
            'legal_persona_name' => $legal_persona_name,
            'component_phone' => $component_phone,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取基本信息
     *
     * @param $access_token 小程序接口调用令牌
     * @return core\mix
     */
    public function getaccountbasicinfo($access_token)
    {
        $url = sprintf($this->accountGetaccountbasicinfoUrl, $access_token);
        return http::get($url);
    }


    /**
     * 设置服务器域名
     *
     * @param $access_token
     * @param $action   add delete set get
     * @param array $requestdomain action==get 不需要
     * @param array $wsrequestdomain action==get 不需要
     * @param array $uploaddomain action==get 不需要
     * @param array $downloaddomain action==get 不需要
     * @return core\mix
     */
    public function modifyDomain($access_token, $action, $requestdomain = [], $wsrequestdomain = [], $uploaddomain = [], $downloaddomain = [])
    {
        $url = sprintf($this->wxaModifyDomainUrl, $access_token);
        $postData = [
            'action' => $action,
            'requestdomain' => $requestdomain,
            'wsrequestdomain' => $wsrequestdomain,
            'uploaddomain' => $uploaddomain,
            'downloaddomain' => $downloaddomain,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 设置业务域名
     *
     * @param $access_token
     * @param $action add delete set get
     * @param array $webviewdomain action==get 不需要
     * @return core\mix
     */
    public function setwebviewdomain($access_token, $action, $webviewdomain = [])
    {
        $url = sprintf($this->wxaSetwebviewdomainUrl, $access_token);
        $postData = [
            'action' => $action,
            'webviewdomain' => $webviewdomain,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     *
     *
     * @param $access_token
     * @param $nick_name
     * @param $id_card
     * @param $liense
     * @param mixed ...$naming_other_stuff
     * @return core\mix
     */
    public function wxaSetnickanme($access_token, $nick_name, $id_card, $liense, ...$naming_other_stuff)
    {
        $url = sprintf($this->wxaSetnicknameUrl, $access_token);
        $postData = [
            'nick_name' => $nick_name,
            'id_card' => $id_card,
            'license' => $liense,
        ];
        if(!empty($naming_other_stuff)) {
            $mediaidNum = count($naming_other_stuff);
            for ($i = 1; $i <= $mediaidNum; $i++) {
                $postData['naming_other_stuff_' . $i] = $naming_other_stuff[$i - 1];
            }
        }
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 微信认证名称检测
     *
     * @param $access_token
     * @param $nick_name
     * @return core\mix
     */
    public function checkwxverifynickname($access_token, $nick_name)
    {
        $url = sprintf($this->wxaverfyCheckwxverifynickanmeUrl, $access_token);
        $postData = [
            'nick_name' => $nick_name
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 查询改名审核状态
     *
     * @param $access_token
     * @param $audit_id
     * @return core\mix
     */
    public function wxaApiWxaQuerynickanme($access_token, $audit_id)
    {
        $url = sprintf($this->wxaApiWxaQuerynickanmeUrl, $access_token);
        $postData = [
            'audit_id' => $audit_id
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 修改头像
     *
     * @param $access_token
     * @param $head_img_mdeia_id
     * @param $x1
     * @param $y1
     * @param $x2
     * @param $y2
     * @return core\mix
     */
    public function accountModifyheadimage($access_token, $head_img_mdeia_id, $x1, $y1, $x2, $y2)
    {
        $url = sprintf($this->accountModifyheadimageUrl, $access_token);
        $postData = [
            'head_img_media_id' => $head_img_mdeia_id,
            'x1' => $x1,
            'y1' => $y1,
            'x2' => $x2,
            'y2' => $y2
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 修改功能介绍
     * @param $access_token
     * @param $signature
     * @return core\mix
     */
    public function accountModifysignature($access_token, $signature)
    {
        $url = sprintf($this->accountModifysignatureUrl, $access_token);
        $postData = [
            'signature' => $signature
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 查询隐私设置
     * @param $access_token
     * @return core\mix
     */
    public function wxaGetwxasearchstatus($access_token)
    {
        $url = sprintf($this->wxaGetwxasearchstatusUrl, $access_token);
        return http::get($url);
    }

    /**
     * 修改隐私设置
     *
     * @param $access_token
     * @param $status
     * @return core\mix
     */
    public function wxaChangewxasearchstatus($access_token, $status)
    {
        $url = sprintf($this->wxaChangewxasearchstatusUrl, $access_token);
        $postData = [
            'status' => $status
        ];
        return http::post($url, [], json_encode($postData));
    }
}