<?php namespace system\model;

use houdunwang\model\Model;

/**
 * Class Config
 *
 * @package system\model
 */
class Config extends Model
{
    //数据表
    protected $table = "config";

    //允许填充字段
    protected $allowFill = ['*'];

    //禁止填充字段
    protected $denyFill = [];

    //自动验证
    protected $validate
        = [
            //['字段名','验证方法','提示信息',验证条件,验证时间]
        ];

    //自动完成
    protected $auto
        = [
            //['字段名','处理方法','方法类型',验证条件,验证时机]
//        ['content','json_encode','function',self::MUST_AUTO,self::MODEL_BOTH]
        ];

    //自动过滤
    protected $filter
        = [
            //[表单字段名,过滤条件,处理时间]
        ];

    //时间操作,需要表中存在created_at,updated_at字段
    protected $timestamps = true;

    /**
     * 保存配置数据
     *
     * @param array $post
     *
     * @return mixed
     */
    public function saveConfig(array $post)
    {
        $model = self::find(1);
        if (empty($model)) {
            $model = new static();
        }
        $model['content'] = json_encode($post, JSON_UNESCAPED_UNICODE);

        return $model->save();
    }
}