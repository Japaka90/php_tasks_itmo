<?php


abstract class Validator
{
    protected $default;
    protected $forceArray = false; // отвалидировать значение как массив
    protected $message; // шаблон сообщения

    public function __construct(array $options=[])
    {
        foreach ($options as $name => $value) {
            $method = 'set' . $name;

            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function detDefault()
    {
        return $this->default;
    }

    public function getMessage(): string
    {
        $template = $this->message ?? $this->getMessageTemplate();

        preg_match_all('~{(\w+)}~i', $template, $replaceKeys);
        $replaceKeys = array_combine($replaceKeys[1], $replaceKeys[0]);

        $replace = [];

        foreach ($replaceKeys as $prop => $name) {
            if (isset($this->$prop)) {
                $replace[$name] = $this->$prop;
            }
        }

        return strtr($template, $replace);
    }


    protected function getMessageTemplate(): string
    {
        return 'Не корректное значение.';
    }


    public function setDefault($value): Validator // если валидация не прошла, то возвр. значение по умолчанию
    {
        $this->default = $this->validate($value);
        return $this;
    }
    public function setForceArray(bool $forceArray): Validator
    {
        $this->forceArray = $forceArray;
        return $this;
    }

    public function setMessage(string $message): Validator
    {
        $this->message = $message;
        return $this;
    }

    abstract public function filter($value);


    protected function filterVar($value, $filter, array $options=[])
    {
        $options['flags'] = ($options['flags'] ?? 0) | FILTER_NULL_ON_FAILURE;

        if ($this->forceArray) {
            $options['flags'] |= FILTER_FORCE_ARRAY;
        }

        return filter_var($value, $filter, $options);
    }

    abstract public function validate($value);
}