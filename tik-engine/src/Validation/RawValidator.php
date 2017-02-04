<?php


class RawValidator extends Validator
{
    public function filter($value)
    {
        return (string) $this->filterVar($value, FILTER_UNSAFE_RAW);
    }

    public function validate($value)
    {
        return $this->filter($value) ?: $this->getDefault;
    }

}