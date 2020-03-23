<?php


namespace ninenight\open\weixin\open;


use ninenight\open\weixin\lib\miniapp;

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
     * @return \ninenight\open\weixin\lib\core\mix
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
     * @return \ninenight\open\weixin\lib\core\mix
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
     * @return \ninenight\open\weixin\lib\core\mix
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
     * @return \ninenight\open\weixin\lib\core\mix
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
     * @return \ninenight\open\weixin\lib\core\mix
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
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function checkwxverifynickname($access_token, $params)
    {
        return $this->miniapp->checkwxverifynickname($access_token, $params['nick_name']);
    }

    /**
     * 查询改名审核状态
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function apiWxaQuerynickanme($access_token, $params)
    {
        return $this->miniapp->wxaApiWxaQuerynickanme($access_token, $params['audit_id']);
    }

    /**
     * 修改头像
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
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
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function modifysignature($access_token, $params)
    {
        return $this->miniapp->accountModifysignature($access_token, $params['signature']);
    }

    /**
     * 查询隐私设置
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function getwxasearchstatus($access_token)
    {
        return $this->miniapp->wxaGetwxasearchstatus($access_token);
    }

    /**
     * 修改隐私设置
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function changewxasearchstatus($access_token, $params)
    {
        return $this->miniapp->wxaChangewxasearchstatus($access_token, $params['status']);
    }

    /**
     * 获取可以设置的所有类目
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenGetallcategories($access_token)
    {
        return $this->miniapp->wxopenGetallcategories($access_token);
    }

    /**
     * 获取已设置的所有类目
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenGetcategory($access_token)
    {
        return $this->miniapp->wxopenGetcategory($access_token);
    }

    /**
     * 添加类目----test
     *
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenAddcategory($access_token, $params)
    {
//        $categories = [];

        return $this->miniapp->wxopenAddcategory($access_token, $params);
    }

    /**
     * 删除类目
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenDeletecategory($access_token, $params)
    {
        return $this->miniapp->wxopenDeletecategory($access_token, $params['first'], $params['second']);
    }

    /**
     * 修改类目
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenModifycategory($access_token, $params)
    {
        return $this->miniapp->wxopenModifycategory($access_token, $params['first'], $params['second'], $params['certicates']);
    }

    /**
     * 获取审核时可填写的类目信息
     *
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxagetCategory($access_token)
    {
        return $this->miniapp->wxaGetCategory($access_token);
    }

    /**
     * 获取展示的公众号信息
     *
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGetshowwxaitem($access_token)
    {
        return $this->miniapp->wxaGetshowwxaitem($access_token);
    }

    /**
     * 获取可以用来设置的公众号列表
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxagetwxamplinkforshow($access_token, $params)
    {
        return $this->miniapp->wxaGetwxamplinkforshow($access_token, $params['page'], $params['num']);
    }

    /**
     * 设置展示的公众号信息
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaUpdateshowwxaitem($access_token, $params)
    {
        return $this->miniapp->wxaUpdateshowwxaitem($access_token, $params['wxa_subscribe_biz_flag'], $params['appid']);
    }

    /**
     * 获取已设置的二维码规则
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenQrcodejumpget($access_token)
    {
        return $this->miniapp->wxopenQrcodejumpget($access_token);
    }

    /**
     * 获取校验文件名称及内容
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenQrcodejumpdownload($access_token)
    {
        return $this->miniapp->wxopenQrcodejumpdownload($access_token);
    }

    /**
     * 增加或修改二维码规则
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenQrcodejumpadd($access_token, $params)
    {
        return $this->miniapp->wxopenQrcodejumpadd($access_token, $params['prefix'], $params['permit_sub_rule'], $params['path'], $params['open_version'], $params['debug_url'], $params['is_edit']);
    }

    /**
     * 发布已设置的二维码规则
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenQrcodejumppublish($access_token, $params)
    {
        return $this->miniapp->wxopenQrcodejumppublish($access_token, $params['prefix']);
    }

    /**
     * 删除已设置的二维码规则
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenQrcodejumpdelete($access_token, $params)
    {
        return $this->miniapp->wxopenQrcodejumpdelete($access_token, $params['prefix']);
    }


    /**
     * 绑定微信用户为体验者
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaBindTester($access_token, $params)
    {
        return $this->miniapp->wxaBindTester($access_token, $params['wechatid']);
    }

    /**
     * 解除绑定体验者
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaUnbindTester($access_token, $params)
    {
        $wechatid = isset($params['wechatid']) ? $params['wechatid'] : '';
        $userstr = isset($params['userstr']) ? $params['userstr'] : '';
        return $this->miniapp->wxaUnbindTester($access_token, $wechatid, $userstr);
    }

    /**
     * 获取体验者列表
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaMemberauth($access_token)
    {
        return $this->miniapp->wxaMemberauth($access_token);
    }

    /**
     * 获取代码草稿列表
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGettemplatedraftlist($access_token)
    {
        return $this->miniapp->wxaGettemplatedraftlist($access_token);
    }

    /**
     * 将草稿添加到代码模板库
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaAddtotemplate($access_token, $params)
    {
        return $this->miniapp->wxaAddtotemplate($access_token, $params['draft_id']);
    }

    /**
     * 获取代码模板列表
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGettemplatelist($access_token)
    {
        return $this->miniapp->wxaGettemplatelist($access_token);
    }

    /**
     * 删除指定代码模版
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaDeletetemplsate($access_token, $params)
    {
        return $this->miniapp->wxaDeletetemplate($access_token, $params['template_id']);
    }

    /**
     * 上传代码
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaCommit($access_token, $params)
    {
        return $this->miniapp->wxaCommit(
            $access_token,
            $params['template_id'],
            $params['ext_json'],
            $params['user_version'],
            $params['user_desc']
        );
    }

    /**
     * 获取已上传的代码的页面列表
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGetPage($access_token)
    {
        return $this->miniapp->wxaGetPage($access_token);
    }

    /**
     * 获取体验版二维码
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGetQrcode($access_token)
    {
        return $this->miniapp->wxaGetQrcode($access_token);
    }

    /**
     * 提交审核
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     *
     * item_list => "address":"index",
                    "tag":"学习 生活",
                    "first_class": "文娱",
                    "second_class": "资讯",
                    "first_id":1,
                    "second_id":2,
                    "title": "首页"
     *
     * preview_info => {
                        "video_id_list": [ "xxxx"],
                        "pic_id_list": [ "xxxx", "yyyy", "zzzz" ]
                        }
     */
    public function wxaSubmitAudit($access_token, $params)
    {
        return $this->miniapp->wxaSubmitAudit(
            $access_token,
            $params['item_list'],
            $params['preview_info'],
            $params['version_desc'],
            $params['feedback_info'],
            $params['feedback_stuff']
        );
    }

    /**
     * 查询指定发布审核单的审核状态
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGetAuditstatus($access_token, $params)
    {
        return $this->miniapp->wxaGetAuditstatus($access_token, $params['auditid']);
    }

    /**
     * 查询最新一次提交的审核状态
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGetLastestAuditstatus($access_token)
    {
        return $this->miniapp->wxaGetLastestAuditstatus($access_token);
    }

    /**
     * 小程序审核撤回
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaUndocodeaudit($access_token)
    {
        return $this->miniapp->wxaUndocodeaudit($access_token);
    }

    /**
     * 发布已通过审核的小程序
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaRelease($access_token)
    {
        return $this->miniapp->wxaRelease($access_token);
    }

    /**
     * 版本回退
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaRevertcoderelease($access_token)
    {
        return $this->miniapp->wxaRevertcoderelease($access_token);
    }

    /**
     * 分阶段发布
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGrayrelease($access_token, $params)
    {
        return $this->miniapp->wxaGrayrelease($access_token, $params['gray_percentage']);
    }

    /**
     * 查询当前分阶段发布详情
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaGetgrayreleaseplan($access_token)
    {
        return $this->miniapp->wxaGetgrayreleaseplan($access_token);
    }

    /**
     * 取消分阶段发布
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaRevertgrayrelease($access_token)
    {
        return $this->miniapp->wxaRevertgrayrelease($access_token);
    }

    /**
     * 修改小程序线上代码的可见状态（仅供第三方代小程序调用）
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaChangeVisitstatus($access_token)
    {
        return $this->miniapp->wxaChangeVisitstatus($access_token);
    }

    /**
     * 查询当前设置的最低基础库版本及各版本用户占比
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenGetweappsupportversion($access_token)
    {
        return $this->miniapp->wxopenGetweappsupportversion($access_token);
    }

    /**
     * 设置最低基础库版本
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenSetweappsupportversion($access_token, $params)
    {
        return $this->miniapp->wxopenSetweappsupportversion($access_token, $params['version']);
    }

    /**
     * 查询服务商的当月提审限额（quota）和加急次数
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaQueryquota($access_token)
    {
        return $this->miniapp->wxaQueryquota($access_token);
    }

    /**
     * 加急审核申请
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaSpeedupaudit($access_token, $params)
    {
        return $this->miniapp->wxaSpeedupaudit($access_token, $params['auditid']);
    }

    /**
     * 获取模板标题列表
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenLibraryList($access_token, $params)
    {
        return $this->miniapp->wxopenLibraryList($access_token, $params['offset'], $params['count']);
    }

    /**
     * 获取模板标题下的关键词库
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenLibraryGet($access_token, $params)
    {
        return $this->miniapp->wxopenLibraryGet($access_token, $params['id']);
    }

    /**
     * 组合模板并添加到个人模板库
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenTemplateAdd($access_token, $params)
    {
        return $this->miniapp->wxopenLibraryAdd($access_token, $params['id'], $params['keyword_id_list']);
    }

    /**
     * 获取帐号下的模板列表
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenTemplateList($access_token, $params)
    {
        return $this->miniapp->wxopenTemplateList($access_token, $params['offset'], $params['count']);
    }

    /**
     * 删除帐号下的某个模板
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxopenTemplateDel($access_token, $params)
    {
        return $this->miniapp->wxopenTemplateDel($access_token, $params['template_id']);
    }


    /**
     * 获取当前帐号所设置的类目信息
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaapiNewtmplGetcategory($access_token)
    {
        return $this->miniapp->wxaapiGetcategory($access_token);
    }

    /**
     * 获取模板标题列表
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaapiNewtmplGetpubtemplatetitles($access_token, $params)
    {
        return $this->miniapp->wxaapiGetpubtemplatetitles($access_token, $params['ids'], $params['start'], $params['limit']);
    }

    /**
     * 获取模板标题下的关键词库
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaapiNewtmplGetpubtemplatekeywords($access_token, $params)
    {
        return $this->miniapp->wxaapiGetpubtemplatekeywords($access_token, $params['tid']);
    }

    /**
     * 组合模板并添加到个人模板库
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaapiNewtmplAddtemplate($access_token, $params)
    {
        return $this->miniapp->wxaapiAddtemplate($access_token, $params['tid'], $params['kidList'], $params['sceneDesc']);
    }

    /**
     * 获取帐号下的模板列表
     * @param $access_token
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaapiNewtmplGettemplate($access_token)
    {
        return $this->miniapp->wxaapiGettemplate($access_token);
    }

    /**
     * 删除帐号下的某个模板
     * @param $access_token
     * @param $params
     * @return \ninenight\open\weixin\lib\core\mix
     */
    public function wxaapiNewtmplDeletemplate($access_token, $params)
    {
        return $this->miniapp->wxaapiDeltemplate($access_token, $params['priTmplId']);
    }

}