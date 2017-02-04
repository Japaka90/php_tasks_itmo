<?php


class FloatValidator extends Validator
{
    public function filter($value)
    {
        return (string) $this->filterVar($value, FILTER_SANITIZE_NUMBER_FLOAT,
            ['flags' => FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND | FILTER_FLAG_ALLOW_SCIENTIFIC]);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_FLOAT,
            ['flags' => FILTER_FLAG_ALLOW_THOUSAND]);
    }

}