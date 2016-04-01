<?php
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2015/9/6
 * Time: 11:01
 */
class myForm
{

    public static function buildFromModel(\Phalcon\Mvc\Model $model,array $extraFields = null)
    {
        if($model->id){
            $form = new Form($model);
        }else{
            $form = new Form();
        }

        $metaDataTypes = $model->getModelsMetaData()->getDataTypes($model);

        $fields =[];
        foreach($metaDataTypes as $column=>$type){
            if(!in_array($column,['created_at','updated_at','id','password','remember_token'])){
                if($metaDataTypes[$column] <> 6){
                    $form->add(new Text($column));
                }else{
                    $form->add(new TextArea($column));
                }

                $fields[]=$column;
            };
        }
        if(null <> $extraFields){
            foreach($extraFields as $column=>$value){
                $model->$column = $value;
                if(isset($metaDataTypes[$column])) continue;
                $form->add(new Text($column));
                $fields[]=$column;
            }
        }

        $form->fields =$fields;

        if($model->id){
            $form->add(new Submit('修改'));
        }else{
            $form->add(new Submit('增加'));
        }
        return $form;
    }

    public static function buildLoginForm()
    {
        $form = new \Phalcon\Forms\Form();
        $form->add(new \Phalcon\Forms\Element\Text('email'));
        $form->add(new \Phalcon\Forms\Element\Password('password'));
        $form->add(new \Phalcon\Forms\Element\Check('remember'));
        $form->add(new \Phalcon\Forms\Element\Submit('Login'));
        return $form;
    }
}