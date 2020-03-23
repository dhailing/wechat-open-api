<?php


namespace ninenight\open\weixin\lib;


use ninenight\open\weixin\lib\core\http;

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
    private $getallcategoriesUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/getallcategories?access_token=%s";                                     //获取可以设置的所有类目 get
    private $getcategoryUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/getcategory?access_token=%s";                                               //获取已设置的所有类目 get
    private $addcategoryUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/addcategory?access_token=%s";                                               //添加类目 post
    private $deletecategoryUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/deletecategory?access_token=%s";                                         //删除类目 post
    private $modifycategoryUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/modifycategory?access_token=%s";                                         //修改类目资质信息 post
    private $getCategoryUrl = "https://api.weixin.qq.com/wxa/get_category?access_token=%s";                                                         //获取审核时可填写的类目信息 get

    //扫码关注组件
    private $getshowwxaitemUrl = "https://api.weixin.qq.com/wxa/getshowwxaitem?access_token=%s";                                                    //获取展示的公众号信息 get
    private $getwxamplinkforshowUrl = "https://api.weixin.qq.com/wxa/getwxamplinkforshow?page=%s&num=%s&access_token=%s";                           //获取可以用来设置的公众号列表 get
    private $updateshowwxaitemUrl = "https://api.weixin.qq.com/wxa/updateshowwxaitem?access_token=%s";                                              //设置展示的公众号信息 get

    //普通链接二维码
    private $qrcodejumpgetUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/qrcodejumpget?access_token=%s";                                           //获取已设置的二维码规则 post
    private $qrcodejumpdownloadUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/qrcodejumpdownload?access_token=%s";                                 //获取校验文件名称及内容 post
    private $qrcodejumpaddUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/qrcodejumpadd?access_token=%s";                                           //增加或修改二维码规则 post
    private $qrcodejumppublishUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/qrcodejumppublish?access_token=%s";                                   //发布已设置的二维码规则 post
    private $qrcodejumpdeleteUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/qrcodejumpdelete?access_token=%s";                                     //删除已设置的二维码规则 post

    //成员管理
    private $bindTesterUrl = "https://api.weixin.qq.com/wxa/bind_tester?access_token=%s";                                                           //绑定微信用户为体验者 post
    private $unbindTesterUrl = "https://api.weixin.qq.com/wxa/unbind_tester?access_token=%s";                                                       //解除绑定体验者 post
    private $memberauthUrl = "https://api.weixin.qq.com/wxa/memberauth?access_token=%s";                                                            //获取体验者列表 post

    //代码模板库设置
    private $gettemplatedraftlistUrl = "https://api.weixin.qq.com/wxa/gettemplatedraftlist?access_token=%s";                                        //获取代码草稿列表 get
    private $addtotemplateUrl = "https://api.weixin.qq.com/wxa/addtotemplate?access_token=%s";                                                      //将草稿添加到代码模板库 post
    private $gettemplatelistUrl = "https://api.weixin.qq.com/wxa/gettemplatelist?access_token=%s";                                                  //绑定微信用户为体验者 post
    private $deletetemplateUrl = "https://api.weixin.qq.com/wxa/deletetemplate?access_token=%s";                                                    //删除指定代码模版 post

    //代码管理
    private $commitUrl = "https://api.weixin.qq.com/wxa/commit?access_token=%s";                                                                    //上传代码 post
    private $getPageUrl = "https://api.weixin.qq.com/wxa/get_page?access_token=%s";                                                                 //获取已上传的代码的页面列表 get
    private $getQrcodeUrl = "https://api.weixin.qq.com/wxa/get_qrcode?access_token=%s&path=page%2Findex%3Faction%3D1";                              //删除指定代码模版 post
    private $submitAuditUrl = "https://api.weixin.qq.com/wxa/submit_audit?access_token=%s";                                                         //提交审核 post
    private $getAuditstatusUrl = "https://api.weixin.qq.com/wxa/get_auditstatus?access_token=%s";                                                   //查询指定发布审核单的审核状态 post
    private $getLatestAuditstatusUrl = "https://api.weixin.qq.com/wxa/get_latest_auditstatus?access_token=%s";                                      //查询最新一次提交的审核状态 post
    private $undocodeauditUrl = "https://api.weixin.qq.com/wxa/undocodeaudit?access_token=%s";                                                      //小程序审核撤回 get
    private $releaseUrl = "https://api.weixin.qq.com/wxa/release?access_token=%s";                                                                  //发布已通过审核的小程序 post
    private $revertcodereleaseUrl = "https://api.weixin.qq.com/wxa/revertcoderelease?access_token=%s";                                              //版本回退 get
    private $grayreleaseUrl = "https://api.weixin.qq.com/wxa/grayrelease?access_token=%s";                                                          //分阶段发布 post
    private $getgrayreleaseplanUrl = "https://api.weixin.qq.com/wxa/getgrayreleaseplan?access_token=%s";                                            //查询当前分阶段发布详情 get
    private $revertgrayreleaseUrl = "https://api.weixin.qq.com/wxa/revertgrayrelease?access_token=%s";                                              //取消分阶段发布 get
    private $changeVisitstatusUrl = "https://api.weixin.qq.com/wxa/change_visitstatus?access_token=%s";                                             //修改小程序线上代码的可见状态（仅供第三方代小程序调用） post
    private $getweappsupportversionUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/getweappsupportversion?access_token=%s";                         //查询当前设置的最低基础库版本及各版本用户占比 post
    private $setweappsupportversionUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/setweappsupportversion?access_token=%s";                         //设置最低基础库版本 post
    private $queryquotaUrl = "https://api.weixin.qq.com/wxa/queryquota?access_token=%s";                                                            //查询服务商的当月提审限额（quota）和加急次数 get
    private $speedupauditUrl = "https://api.weixin.qq.com/wxa/speedupaudit?access_token=%s";                                                        //加急审核申请 post

    //模板消息
    private $templateLibraryListUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/template/library/list?access_token=%s";                             //获取模板标题列表 post
    private $templateGetUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/template/library/get?access_token=%s";                                      //获取模板标题下的关键词库 post
    private $templateAddUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/template/add?access_token=%s";                                              //组合模板并添加到个人模板库 post
    private $templateListUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/template/list?access_token=%s";                                            //获取帐号下的模板列表 post
    private $templateDelUrl = "https://api.weixin.qq.com/cgi-bin/wxopen/template/del?access_token=%s";                                              //删除帐号下的某个模板 post

    //订阅消息
    private $newtmplGetcategoryUrl = "https://api.weixin.qq.com/wxaapi/newtmpl/getcategory?access_token=%s";                                        //获取当前帐号所设置的类目信息 get
    private $getpubtemplatetitlesUrl = "https://api.weixin.qq.com/wxaapi/newtmpl/getpubtemplatetitles?access_token=%s";                             //获取模板标题列表 get
    private $getpubtemplatekeywordsUrl = "https://api.weixin.qq.com/wxaapi/newtmpl/getpubtemplatekeywords?access_token=%s";                         //获取模板标题下的关键词库 get
    private $addtemplateUrl = "https://api.weixin.qq.com/wxaapi/newtmpl/addtemplate?access_token=%s";                                               //组合模板并添加到个人模板库 post
    private $gettemplateUrl = "https://api.weixin.qq.com/wxaapi/newtmpl/gettemplate?access_token=%s";                                               //获取帐号下的模板列表 get
    private $deltemplateUrl = "https://api.weixin.qq.com/wxaapi/newtmpl/deltemplate?access_token=%s";                                               //删除帐号下的某个模板 post

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
        if (!empty($naming_other_stuff)) {
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

    /**
     * 获取可以设置的所有类目
     *
     * @param $access_token
     * @return core\mix
     */
    public function wxopenGetallcategories($access_token)
    {
        $url = sprintf($this->getallcategoriesUrl, $access_token);
        return http::get($url);
    }

    /**
     * 获取已设置的所有类目
     *
     * @param $access_token
     * @return core\mix
     */
    public function wxopenGetcategory($access_token)
    {
        $url = sprintf($this->getcategoryUrl, $access_token);
        return http::get($url);
    }

    /**
     * 添加类目
     *
     * @param $access_token
     * @param array $categories
     * @return core\mix
     * {
     * "categories": [
     * {
     * "first": 8,
     * "second": 39,
     * "certicates": [
     * {
     * "key": "《因私出入境中介机构经营许可证》",
     * "value": "media_id"
     * }
     * ]
     * }
     * ]
     * }
     * 返回参
     */
    public function wxopenAddcategory($access_token, $categories = [])
    {
        $url = sprintf($this->addcategoryUrl, $access_token);
        $postData = [
            'categories' => $categories
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 删除类目
     * @param $access_token
     * @param $frist
     * @param $second
     * @return core\mix
     */
    public function wxopenDeletecategory($access_token, $frist, $second)
    {
        $url = sprintf($this->deletecategoryUrl, $access_token);
        $postData = [
            'first' => $frist,
            'second' => $second
        ];

        return http::post($url, [], json_encode($postData));
    }

    /**
     * 修改资源类目
     * @param $access_token
     * @param $frist
     * @param $second
     * @param $certicates
     * @return core\mix
     * {
     * "first": 8,
     * "second": 39,
     * "certicates": [{
     * "key": "《因私出入境中介机构经营许可证》",
     * "value": ""
     * }]
     * }
     */
    public function wxopenModifycategory($access_token, $frist, $second, $certicates)
    {
        $url = sprintf($this->modifycategoryUrl, $access_token);
        $postData = [
            'first' => $frist,
            'second' => $second,
            'certicates' => $certicates
        ];

        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取审核时可填写的类目信息
     * @param $access_token
     * @return core\mix
     */
    public function wxaGetCategory($access_token)
    {
        $url = sprintf($this->getCategoryUrl, $access_token);
        return http::get($url);
    }


    /**
     * 获取展示的公众号信息
     *
     * @param $access_token
     * @return core\mix
     */
    public function wxaGetshowwxaitem($access_token)
    {
        $url = sprintf($this->getshowwxaitemUrl, $access_token);
        return http::get($url);
    }


    /**
     * 获取可以用来设置的公众号列表
     *
     * @param $access_token
     * @param $page
     * @param $num
     * @return core\mix
     */
    public function wxaGetwxamplinkforshow($access_token, $page, $num)
    {
        $url = sprintf($this->getwxamplinkforshowUrl, $page, $num, $access_token);
        return http::get($url);
    }


    /**
     * 设置展示的公众号信息
     * @param $access_token
     * @param $wxa_subscribe_biz_flag
     * @param $appid
     * @return core\mix
     */
    public function wxaUpdateshowwxaitem($access_token, $wxa_subscribe_biz_flag, $appid)
    {
        $url = sprintf($this->updateshowwxaitemUrl, $access_token);
        $postData = [
            'wxa_subscribe_biz_flag' => $wxa_subscribe_biz_flag,
            'appid' => $appid,
        ];

        return http::post($url, [], json_encode($postData));
    }


    /**
     * 获取已设置的二维码规则
     * @param $access_token
     * @return core\mix
     */
    public function wxopenQrcodejumpget($access_token)
    {
        $url = sprintf($this->qrcodejumpgetUrl, $access_token);

        return http::post($url);
    }


    /**
     * 获取校验文件名称及内容
     * @param $access_token
     * @return core\mix
     */
    public function wxopenQrcodejumpdownload($access_token)
    {
        $url = sprintf($this->qrcodejumpdownloadUrl, $access_token);

        return http::post($url);
    }

    /**
     * 增加或修改二维码规则
     *
     * @param $access_token
     * @param $prefix
     * @param $permit_sub_rule
     * @param $path
     * @param $open_version
     * @param array $devug_url
     * @param int $is_edit
     * @return core\mix
     */
    public function wxopenQrcodejumpadd($access_token, $prefix, $permit_sub_rule, $path, $open_version, $devug_url = [], $is_edit = 0)
    {
        $url = sprintf($this->qrcodejumpaddUrl, $access_token);
        $postData = [
            'prefix' => $prefix,
            'permit_sub_rule' => $permit_sub_rule,
            'path' => $path,
            'open_version' => $open_version,
            'debug_url' => $devug_url,
            'is_edit' => $is_edit,
        ];

        return http::post($url, [], json_encode($postData));
    }


    /**
     * 发布已设置的二维码规则
     * @param $access_token
     * @param $prefix
     * @return core\mix
     */
    public function wxopenQrcodejumppublish($access_token, $prefix)
    {
        $url = sprintf($this->qrcodejumppublishUrl, $access_token);
        $postData = [
            'prefix' => $prefix
        ];

        return http::post($url, [], json_encode($postData));
    }

    /**
     * 删除已设置的二维码规则
     * @param $access_token
     * @param $prefix
     * @return core\mix
     */
    public function wxopenQrcodejumpdelete($access_token, $prefix)
    {
        $url = sprintf($this->qrcodejumpdeleteUrl, $access_token);
        $postData = [
            'prefix' => $prefix
        ];

        return http::post($url, [], json_encode($postData));
    }

    /**
     * 绑定微信用户为体验者
     * @param $access_token
     * @param $wechatid
     * @return core\mix
     */
    public function wxaBindTester($access_token, $wechatid)
    {
        $url = sprintf($this->bindTesterUrl, $access_token);
        $postData = [
            'wechatid' => $wechatid
        ];

        return http::post($url, [], json_encode($postData));
    }

    /**
     *
     * 解除绑定体验者
     *
     * @param $access_token
     * @param string $wechatid
     * @param string $userstr
     * @return core\mix
     */
    public function wxaUnbindTester($access_token, $wechatid = '', $userstr = '')
    {
        $url = sprintf($this->unbindTesterUrl, $access_token);
        $postData = [];
        if ($wechatid) {
            $postData['wechatid'] = $wechatid;
        }
        if ($userstr) {
            $postData['userstr'] = $userstr;
        }

        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取体验者列表
     * @param $access_token
     * @param string $action
     * @return core\mix
     */
    public function wxaMemberauth($access_token, $action = 'get_experiencer')
    {
        $url = sprintf($this->memberauthUrl, $access_token);
        $postData = [
            'action' => $action
        ];

        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取代码草稿列表
     * @param $access_token
     * @return core\mix
     */
    public function wxaGettemplatedraftlist($access_token)
    {
        $url = sprintf($this->gettemplatedraftlistUrl, $access_token);
        return http::get($url);
    }

    /**
     * 将草稿添加到代码模板库
     * @param $access_token
     * @param $draft_id
     * @return core\mix
     */
    public function wxaAddtotemplate($access_token, $draft_id)
    {
        $url = sprintf($this->addtotemplateUrl, $access_token);
        $postData = [
            'draft_id' => $draft_id
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取代码模板列表
     * @param $access_token
     * @return core\mix
     */
    public function wxaGettemplatelist($access_token)
    {
        $url = sprintf($this->gettemplatelistUrl, $access_token);
        return http::get($url);
    }

    /**
     * 删除指定代码模版
     * @param $access_token
     * @param $template_id
     * @return core\mix
     */
    public function wxaDeletetemplate($access_token, $template_id)
    {
        $url = sprintf($this->deletetemplateUrl, $access_token);
        $postData = [
            'template_id' => $template_id
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 上传小程序代码
     * @param $access_token
     * @param $template_id 代码库中的代码模版 ID
     * @param $ext_json 第三方自定义的配置
     * @param $user_version 代码版本号，开发者可自定义（长度不要超过 64 个字符）
     * @param $user_desc 代码描述，开发者可自定义
     * @return core\mix
     */
    public function wxaCommit($access_token, $template_id, $ext_json, $user_version, $user_desc)
    {
        $url = sprintf($this->commitUrl, $access_token);
        $postData = [
            'template_id' => $template_id,
            'ext_json' => $ext_json,
            'user_version' => $user_version,
            'user_desc' => $user_desc,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取已上传的代码的页面列表
     * @param $access_token
     * @return core\mix
     */
    public function wxaGetPage($access_token)
    {
        $url = sprintf($this->getPageUrl, $access_token);
        return http::get($url);
    }

    /**
     * 获取体验版二维码
     * @param $access_token
     * @return core\mix
     */
    public function wxaGetQrcode($access_token)
    {
        $url = sprintf($this->getQrcodeUrl, $access_token);
        return http::get($url);
    }

    /**
     * 提交审核
     * @param $access_token
     * @param null $item_list
     * @param null $preview_info
     * @param string $version_desc
     * @param string $feedback_info
     * @param string $feedback_stuff
     * @return core\mix
     * {
        "item_list": [
            {
            "address":"index",
            "tag":"学习 生活",
            "first_class": "文娱",
            "second_class": "资讯",
            "first_id":1,
            "second_id":2,
            "title": "首页"
            },
            {
            "address":"page/logs/logs",
            "tag":"学习 工作",
            "first_class": "教育",
            "second_class": "学历教育",
            "third_class": "高等",
            "first_id":3,
            "second_id":4,
            "third_id":5,
            "title": "日志"
            }
        ],
        "feedback_info": "blablabla",
        "feedback_stuff": "xx|yy|zz",
        "preview_info" : {
            "video_id_list": [ "xxxx"],
            "pic_id_list": [ "xxxx", "yyyy", "zzzz" ]
        },
        "version_desc":"blablabla"
    }
     */
    public function wxaSubmitAudit($access_token, $item_list = null, $preview_info = null, $version_desc = '', $feedback_info = '', $feedback_stuff = '')
    {
        $url = sprintf($this->submitAuditUrl, $access_token);
        $postData = [
            'item_list' => $item_list,
            'feedback_info' => $feedback_info,
            'feedback_stuff' => $feedback_stuff,
            'preview_info' => $preview_info,
            'version_desc' => $version_desc,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 查询指定发布审核单的审核状态
     * @param $access_token
     * @param $auditid
     * @return core\mix
     */
    public function wxaGetAuditstatus($access_token, $auditid)
    {
        $url = sprintf($this->getAuditstatusUrl, $access_token);
        $postData = [
            'auditid' => $auditid
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 查询最新一次提交的审核状态
     * @param $access_token
     * @return core\mix
     */
    public function wxaGetLastestAuditstatus($access_token)
    {
        $url = sprintf($this->getLatestAuditstatusUrl, $access_token);
        return http::get($url);
    }

    /**
     * 小程序审核撤回
     * @param $access_token
     * @return core\mix
     */
    public function wxaUndocodeaudit($access_token)
    {
        $url = sprintf($this->undocodeauditUrl, $access_token);
        return http::get($url);
    }

    /**
     * 发布已通过审核的小程序
     * @param $access_token
     * @return core\mix
     */
    public function wxaRelease($access_token)
    {
        $url = sprintf($this->releaseUrl, $access_token);
        $postData = [];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 版本回退
     * @param $access_token
     * @return core\mix
     * 注意：
    如果没有上一个线上版本，将无法回退
    只能向上回退一个版本，即当前版本回退后，不能再调用版本回退接口
     */
    public function wxaRevertcoderelease($access_token)
    {
        $url = sprintf($this->revertcodereleaseUrl, $access_token);
        return http::get($url);
    }

    /**
     * 分阶段发布
     * @param $access_token
     * @param $gray_percentage
     * @return core\mix
     */
    public function wxaGrayrelease($access_token, $gray_percentage)
    {
        $url = sprintf($this->grayreleaseUrl, $access_token);
        $postData = [
            'gray_percentage' => $gray_percentage
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 查询当前分阶段发布详情
     * @param $access_token
     * @return core\mix
     */
    public function wxaGetgrayreleaseplan($access_token)
    {
        $url = sprintf($this->getgrayreleaseplanUrl, $access_token);
        return http::get($url);
    }

    /**
     * 取消分阶段发布
     * @param $access_token
     * @return core\mix
     */
    public function wxaRevertgrayrelease($access_token)
    {
        $url = sprintf($this->revertgrayreleaseUrl, $access_token);
        return http::get($url);
    }

    /**
     * 修改小程序线上代码的可见状态（仅供第三方代小程序调用）
     * @param $access_token
     * @param string $action
     * @return core\mix
     */
    public function wxaChangeVisitstatus($access_token, $action = 'close')
    {
        $url = sprintf($this->changeVisitstatusUrl, $access_token);
        $postData = [
            'action' => $action
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 查询当前设置的最低基础库版本及各版本用户占比
     * @param $access_token
     * @return core\mix
     */
    public function wxopenGetweappsupportversion($access_token)
    {
        $url = sprintf($this->getweappsupportversionUrl, $access_token);
        $postData = [];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 设置最低基础库版本
     * @param $access_token
     * @param $version
     * @return core\mix
     */
    public function wxopenSetweappsupportversion($access_token, $version)
    {
        $url = sprintf($this->setweappsupportversionUrl, $access_token);
        $postData = [
            'version' => $version
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 查询服务商的当月提审限额（quota）和加急次数
     * @param $access_token
     * @return core\mix
     */
    public function wxaQueryquota($access_token)
    {
        $url = sprintf($this->queryquotaUrl, $access_token);
        $postData = [];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 加急审核申请
     * @param $access_token
     * @return core\mix
     */
    public function wxaSpeedupaudit($access_token, $auditid)
    {
        $url = sprintf($this->speedupauditUrl, $access_token);
        $postData = [
            'auditid' => $auditid
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取模板标题列表
     * @param $access_token
     * @param $offset
     * @param $count
     * @return core\mix
     */
    public function wxopenLibraryList($access_token, $offset, $count)
    {
        $url = sprintf($this->templateLibraryListUrl, $access_token);
        $postData = [
            'offset' => $offset,
            'count' => $count,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取模板标题下的关键词库
     * @param $access_token
     * @param $id
     * @return core\mix
     */
    public function wxopenLibraryGet($access_token, $id)
    {
        $url = sprintf($this->templateGetUrl, $access_token);
        $postData = [
            'id' => $id,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 组合模板并添加到个人模板库
     * @param $access_token
     * @param $id
     * @param $keyword_id_list
     * @return core\mix
     */
    public function wxopenLibraryAdd($access_token, $id, $keyword_id_list)
    {
        $url = sprintf($this->templateAddUrl, $access_token);
        $postData = [
            'id' => $id,
            'keyword_id_list' => $keyword_id_list,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取帐号下的模板列表
     * @param $access_token
     * @param $offset
     * @param $count
     * @return core\mix
     */
    public function wxopenTemplateList($access_token, $offset, $count)
    {
        $url = sprintf($this->templateListUrl, $access_token);
        $postData = [
            'offset' => $offset,
            'count' => $count,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 删除帐号下的某个模板
     * @param $access_token
     * @param $template_id
     * @return core\mix
     */
    public function wxopenTemplateDel($access_token, $template_id)
    {
        $url = sprintf($this->templateDelUrl, $access_token);
        $postData = [
            'template_id' => $template_id,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取当前帐号所设置的类目信息
     * @param $access_token
     * @return core\mix
     */
    public function wxaapiGetcategory($access_token)
    {
        $url = sprintf($this->newtmplGetcategoryUrl, $access_token);
        return http::get($url);
    }

    /**
     * 获取模板标题列表
     * @param $access_token
     * @param $ids
     * @param $start
     * @param $limit
     * @return core\mix
     */
    public function wxaapiGetpubtemplatetitles($access_token, $ids, $start, $limit)
    {
        $url = sprintf($this->getpubtemplatetitlesUrl, $access_token);
        $body = [
            'ids' => $ids,
            'start' => $start,
            'limit' => $limit
        ];
        return http::get($url, [], json_encode($body));
    }

    /**
     * 获取模板标题下的关键词库
     * @param $access_token
     * @param $tid
     * @return core\mix
     */
    public function wxaapiGetpubtemplatekeywords($access_token, $tid)
    {
        $url = sprintf($this->getpubtemplatekeywordsUrl, $access_token);
        $body = [
            'tid' => $tid,
        ];
        return http::get($url, [], json_encode($body));
    }

    /**
     * 组合模板并添加到个人模板库
     * @param $access_token
     * @param $tid
     * @param $kidList
     * @param $sceneDesc
     * @return core\mix
     */
    public function wxaapiAddtemplate($access_token, $tid, $kidList, $sceneDesc)
    {
        $url = sprintf($this->addtemplateUrl, $access_token);
        $postData = [
            'tid' => $tid,
            'kidList' => $kidList,
            'sceneDesc' => $sceneDesc,
        ];
        return http::post($url, [], json_encode($postData));
    }

    /**
     * 获取帐号下的模板列表
     * @param $access_token
     * @return core\mix
     */
    public function wxaapiGettemplate($access_token)
    {
        $url = sprintf($this->gettemplateUrl, $access_token);
        return http::get($url);
    }

    /**
     * 删除帐号下的某个模板
     * @param $access_token
     * @param $priTmplId
     * @return core\mix
     */
    public function wxaapiDeltemplate($access_token, $priTmplId)
    {
        $url = sprintf($this->deltemplateUrl, $access_token);
        $postData = [
            'priTmplId' => $priTmplId,
        ];
        return http::post($url, [], json_encode($postData));
    }
}