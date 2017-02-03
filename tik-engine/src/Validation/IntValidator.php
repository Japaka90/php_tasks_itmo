<?php

class IntValidator extends Validator
{
    public function filter($value)
    {
        return (string) $this->validate($value);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_INT);
    }

}