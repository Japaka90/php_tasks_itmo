<?php


class RawValidator extends Validator
{
    public function filter($value)
    {
        return (string) $this->validate($value);
    }

    public function validate($value)
    {
        return $value;
    }

}