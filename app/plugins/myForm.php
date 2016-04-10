<?php
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Password;
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
        $form = new Form($model);
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
        $form = new Form();
        $form->add(new Text('email'));
        $form->add(new Password('password'));
        $form->add(new Check('remember'));
        $form->add(new Submit('Login'));
        return $form;
    }

    public static function buildMyInfoForm(User $user)
    {
        $form = new Form($user);
        $form->add(new Text('name'));
        $form->add(new Text('mobile'));
        $form->add(new Text('position'));
        $form->add(new Text('email'));
        $form->add(new Submit('修改'));
        return $form;
    }
}