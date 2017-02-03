<?php


class FloatValidator extends Validator
{
    public function filter($value)
    {
        return (string) $this->filterVar($value, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_FLOAT);
    }

}