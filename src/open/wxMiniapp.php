<?php


namespace jzweb\open\weixin\open;


use jzweb\open\weixin\lib\miniapp;

class wxMiniapp
{
    private $miniapp;

    public function __construct()
    {
        $this->miniapp = new miniapp();
    }

    /**
     * 快速创建小程序
     *
     * @param string $component_access_token
     * @param array $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function createFastregisterweapp($component_access_token, $params)
    {
        return $this->miniapp->fastregisterweapp(
            $component_access_token,
            $params['name'],
            $params['code'],
            $params['code_type'],
            $params['legal_persona_wechat'],
            $params['legal_persona_name'],
            $params['component_phone']
        );
    }

    /**
     * 获取基本信息
     *
     * @param $access_token
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function getAccountBaseInfo($access_token)
    {
        return $this->miniapp->getaccountbasicinfo($access_token);
    }

    /**
     * 设置服务器域名
     *
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function wxaModifyDomain($access_token, $params)
    {
        return $this->miniapp->modifyDomain(
          $access_token,
          $params['action'],
          $params['requestdomain'],
          $params['wsrequestdomain'],
          $params['uploaddomain'],
          $params['downloaddomain'],
        );
    }

    /**
     * 设置业务域名
     *
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function wxaSetwebviewdomain($access_token, $params)
    {
        return $this->miniapp->setwebviewdomain(
            $access_token,
            $params['action'],
            $params['webviewdomain']
        );
    }

    /**
     * 设置名称
     *
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function wxaSetnickanme($access_token, $params)
    {
        $other_stuff_1 = $params['naming_other_stuff_1'] ?? '';
        $other_stuff_2 = $params['naming_other_stuff_2'] ?? '';
        $other_stuff_3 = $params['naming_other_stuff_3'] ?? '';
        $other_stuff_4 = $params['naming_other_stuff_4'] ?? '';
        return $this->miniapp->wxaSetnickanme(
            $access_token,
            $params['nick_name'],
            $params['id_card'],
            $params['license'],
            $other_stuff_1,
            $other_stuff_2,
            $other_stuff_3,
            $other_stuff_4
        );
    }

    /**
     * 微信认证名称检测
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function checkwxverifynickname($access_token, $params)
    {
        return $this->miniapp->checkwxverifynickname($access_token, $params['nick_name']);
    }

    /**
     * 查询改名审核状态
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function apiWxaQuerynickanme($access_token, $params)
    {
        return $this->miniapp->wxaApiWxaQuerynickanme($access_token, $params['audit_id']);
    }

    /**
     * 修改头像
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function modifyheadimage($access_token, $params)
    {
        return $this->miniapp->accountModifyheadimage(
            $access_token,
            $params['head_img_media_id'],
            $params['x1'],
            $params['y1'],
            $params['x2'],
            $params['y2'],
        );
    }

    /**
     * 修改功能介绍
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function modifysignature($access_token, $params)
    {
        return $this->miniapp->accountModifysignature($access_token, $params['signature']);
    }

    /**
     * 查询隐私设置
     * @param $access_token
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function getwxasearchstatus($access_token)
    {
        return $this->miniapp->wxaGetwxasearchstatus($access_token);
    }

    /**
     * 修改隐私设置
     * @param $access_token
     * @param $params
     * @return \jzweb\open\weixin\lib\core\mix
     */
    public function changewxasearchstatus($access_token, $params)
    {
        return $this->miniapp->wxaChangewxasearchstatus($access_token, $params['status']);
    }
}