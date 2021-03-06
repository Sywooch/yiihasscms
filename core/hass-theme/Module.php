<?php
/**
 * HassCMS (http://www.hassium.org/)
 *
 * @link http://github.com/hasscms for the canonical source repository
 * @copyright Copyright (c) 2016-2099 Hassium Software LLC.
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
namespace hass\theme;

use yii\base\BootstrapInterface;
use hass\base\classes\Hook;
use hass\system\enums\ModuleGroupEnmu;

/**
 *
 * @package hass\package_name
 * @author zhepama <zhepama@gmail.com>
 * @since 0.1.0
 *       
 */
class Module extends \hass\module\BaseModule implements BootstrapInterface
{

    function init()
    {
        parent::init();
    }

    public function bootstrap($app)
    {
        Hook::on(\hass\system\Module::EVENT_SYSTEM_GROUPNAV, [
            $this,
            "onSetGroupNav"
        ]);
    }

    /**
     *
     * @param \hass\base\helpers\Event $event            
     */
    public function onSetGroupNav($event)
    {
        $item = [
            'label' => "主题",
            'icon' => "fa-circle-o",
            'url' => [
                "/$this->id/default/index"
            ]
        ];
        
        $event->parameters->set(ModuleGroupEnmu::APPEARANCE, [
            $item
        ]);
    }
}