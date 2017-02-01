<?php



class  SanitizeClass
{
    private $attribute;
    private $message;
    private $errors;
    private $data;
    private $rules;

    public function __construct($attribute, $message, array $errors, array $data, array $rules)
    {
        $this->attribute = $attribute;
        $this->message = $message;
        $this->errors = $errors ?? [];
        $this->data = $data;
        $this->rules = $rules;
    }


    public function sanitizeAddError($attribute, $message, $errors)
    {
        $this->errors[$this->attribute] = strtr($this->message, [
            '{attribute}' => $this->attribute,

        ]);
    }

    public function sanitize($data, $rules, $errors = null)
    {
        foreach ($this->rules as $key => $rule) {
            $rule['flags'] = ($rule['flags'] ?? 0) | FILTER_NULL_ON_FAILURE;

            $rule['required'] = (bool)($this->rules['required'] ?? false);

            $rule['message'] = $rule['message'] ?? '';

            $this->rules[$key] = $rule;
        }

        $this->data = array_map('trim', $this->data);
        $filteredData = filter_var_array($this->data, $this->rules);

        foreach ($filteredData as $attribute => $value) {
            $rule = $rules[$attribute];

            if (is_null($value)) {
                if (
                    !isset($this->data[$attribute]) &&
                    $this->data[$this->attribute] ||
                    ($this->data[$this->attribute] === '' && $rule['required'])
                ) {
                    $sanitizeAddError(
                        $this->attribute,
                        $rule['message'] ?: 'Не корректное значение в поле "{attribute}".',
                        $this->errors
                    );
                }
            }

            if (is_string($value)) {
                $value = trim($value);
                $filteredData[$attribute] = $value;

                if (!$value && $rule['required']) {
                    $this->sanitizeAddError(
                        $this->attribute,
                        $rule['message'] ?: 'Не заполнено обязательное поле "{attribute}".',
                        $this->errors
                    );
                }
            }
        }

        return $filteredData;

    }
}