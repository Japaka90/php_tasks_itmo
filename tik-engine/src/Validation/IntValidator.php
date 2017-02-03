<?php

class IntValidator extends Validator
{
    public function filter($value)
    {
        return (string) $this->filterVar($value, FILTER_SANITIZE_NUMBER_INT);
    }

    public function validate($value)
    {
        return $this->filterVar($value, FILTER_VALIDATE_INT);
    }

}