<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class EntryForm extends Model
{
    public $name;
    public $email;
    public $text;
    public $topic;

    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required', 'message'  => 'Это поле обязательно для заполнения'],
            ['email', 'email'],
            //собственный валидатор validateCountry
            ['topic', 'validateCountry',  'skipOnEmpty' => false ],

            //дииапазон символов в строке
            // ['topic', 'string', 'length' =>[3,5]],

            // ['topic', 'string', 'min'  => 3, 'tooShort' => 'Минимум 3 знака'],
            // ['topic', 'string', 'max'  => 5, 'tooLong' => 'Максимум 5 знаков'],

            // ['topic', 'required', 'message'  => 'Укажите тему'],
        ];
    }
    //описание валидатора, где в $attribute записывается topic
    public function validateCountry($attribute, $params)
    {
        //обращение к сво-ву
        if (!in_array($this->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($attribute, 'Страна должна быть либо "USA" или "Indonesia".');
        }
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Комментарий',
            'topic' => 'Тема',
        ];
    }
}