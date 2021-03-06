<?php

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2016/1/11
 * Time: 20:20
 * 提供一个全局的事件处理管理器
 */
class myEventManager extends \Phalcon\Events\Manager
{
    // $this->listen('auth:login','authEventHandler::login');
    /**
     * @param $eventName
     * @param $handlerAction
     */
    public function listen($eventName, $handlerAction)
    {
        $this->attach($eventName,function($event,$object=null,$data=null) use($handlerAction){
            if (preg_match('/(.+)::(.+)/m', $handlerAction, $regs)) {
                $handlerName = $regs[1];
                $action = $regs[2];
                $handler = new $handlerName;
                $handler->$action($event,$object,$data);
            }
        });
    }

    /**以批量方式来绑定事件
     * @param $eventDomain
     * @param array $handlerClassArray
     */
    public function register($eventDomain, array $handlerClassArray)
    {
            foreach($handlerClassArray as $handler){
//                $this->attach($eventDomain,new $handler);
                $this->attach($eventDomain,function($e,$eventObject) use($handler){
                    $actionName = 'when'.get_class($eventObject);
                    $handler = new $handler();
                    if(method_exists($handler,$actionName)){
                        $handler->$actionName($eventObject);
                    }

                });
            }
    }

    /**能够处理对象类事件
     * @param $event
     */
    public function trigger($event)
    {
        $eventName = $this->getEventName($event);
        $this->fire($eventName,$event);
    }

    
//    ---------------helper functions ---------------------

    private function getEventName($event)
    {
        return ConfigFacade::getService()->application->eventPrefix.':'.get_class($event);
    }


}