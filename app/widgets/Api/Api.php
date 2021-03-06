<?php

use App\Configuration;
use Movim\Widget\Base;

class Api extends Base
{
    function ajaxRegister()
    {
        $json = requestURL(
            MOVIM_API.'pods/register',
            3,
            ['url' => BASE_URI]);

        $json = json_decode($json);

        if (isset($json) && $json->status == 200) {
            $this->rpc('MovimUtils.reloadThis');
            Notification::append(null, $this->__('api.conf_updated'));
        }
    }

    function ajaxUnregister()
    {
        $configuration = Configuration::findOrNew(1);

        $configuration->unregister = !$configuration->unregister;
        $configuration->save();

        $this->rpc('MovimUtils.reloadThis');
    }

    function display()
    {
        $this->view->assign(
            'infos',
            $this->__(
                'api.info',
                '<a href="http://api.movim.eu/" target="_blank">',
                '</a>'));

        $json = requestURL(MOVIM_API.'pods/status', 2, ['url' => BASE_URI]);
        $json = json_decode($json);

        $configuration = Configuration::findOrNew(1);

        if (isset($json)) {
            $this->view->assign('json', $json);
            if ($json->status == 200) {
                $this->view->assign('unregister', $this->call('ajaxUnregister'));
                $this->view->assign('unregister_status', $configuration->unregister);
            } else {
                $configuration->unregister = false;
                $configuration->save();
                $this->view->assign('register', $this->call('ajaxRegister'));
            }
        } else {
            $this->view->assign('json', null);
        }
    }
}
