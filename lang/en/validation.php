<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute fieldmust be accepted.',
    'accepted_if' => 'The :attribute fieldmust be accepted when :other is :value.',
    'active_url' => 'The :attribute fieldmust be a valid URL.',
    'after' => 'The :attribute fieldmust be a date after :date.',
    'after_or_equal' => 'The :attribute fieldmust be a date after or equal to :date.',
    'alpha' => 'The :attribute fieldmust only contain letters.',
    'alpha_dash' => 'The :attribute fieldmust only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute fieldmust only contain letters and numbers.',
    'array' => 'The :attribute fieldmust be an array.',
    'ascii' => 'The :attribute fieldmust only contain single-byte alphanumeric characters and symbols.',
    'before' => 'The :attribute fieldmust be a date before :date.',
    'before_or_equal' => 'The :attribute fieldmust be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute fieldmust have between :min and :max items.',
        'file' => 'The :attribute fieldmust be between :min and :max kilobytes.',
        'numeric' => 'The :attribute fieldmust be between :min and :max.',
        'string' => 'The :attribute fieldmust be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute fieldmust be true or false.',
    'can' => 'The :attribute fieldcontains an unauthorized value.',
    'confirmed' => 'The :attribute fieldconfirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute fieldmust be a valid date.',
    'date_equals' => 'The :attribute fieldmust be a date equal to :date.',
    'date_format' => 'The :attribute fieldmust match the format :format.',
    'decimal' => 'The :attribute fieldmust have :decimal decimal places.',
    'declined' => 'The :attribute fieldmust be declined.',
    'declined_if' => 'The :attribute fieldmust be declined when :other is :value.',
    'different' => 'The :attribute fieldand :other must be different.',
    'digits' => 'The :attribute fieldmust be :digits digits.',
    'digits_between' => 'The :attribute fieldmust be between :min and :max digits.',
    'dimensions' => 'The :attribute fieldhas invalid image dimensions.',
    'distinct' => 'The :attribute fieldhas a duplicate value.',
    'doesnt_end_with' => 'The :attribute fieldmust not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute fieldmust not start with one of the following: :values.',
    'email' => 'The :attribute fieldmust be a valid email address.',
    'ends_with' => 'The :attribute fieldmust end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute fieldmust be a file.',
    'filled' => 'The :attribute fieldmust have a value.',
    'gt' => [
        'array' => 'The :attribute fieldmust have more than :value items.',
        'file' => 'The :attribute fieldmust be greater than :value kilobytes.',
        'numeric' => 'The :attribute fieldmust be greater than :value.',
        'string' => 'The :attribute fieldmust be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute fieldmust have :value items or more.',
        'file' => 'The :attribute fieldmust be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute fieldmust be greater than or equal to :value.',
        'string' => 'The :attribute fieldmust be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute fieldmust be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute fieldmust exist in :other.',
    'integer' => 'The :attribute fieldmust be an integer.',
    'ip' => 'The :attribute fieldmust be a valid IP address.',
    'ipv4' => 'The :attribute fieldmust be a valid IPv4 address.',
    'ipv6' => 'The :attribute fieldmust be a valid IPv6 address.',
    'json' => 'The :attribute fieldmust be a valid JSON string.',
    'lowercase' => 'The :attribute fieldmust be lowercase.',
    'lt' => [
        'array' => 'The :attribute fieldmust have less than :value items.',
        'file' => 'The :attribute fieldmust be less than :value kilobytes.',
        'numeric' => 'The :attribute fieldmust be less than :value.',
        'string' => 'The :attribute fieldmust be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute fieldmust not have more than :value items.',
        'file' => 'The :attribute fieldmust be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute fieldmust be less than or equal to :value.',
        'string' => 'The :attribute fieldmust be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute fieldmust be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute fieldmust not have more than :max items.',
        'file' => 'The :attribute fieldmust not be greater than :max kilobytes.',
        'numeric' => 'The :attribute fieldmust not be greater than :max.',
        'string' => 'The :attribute fieldmust not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute fieldmust not have more than :max digits.',
    'mimes' => 'The :attribute fieldmust be a file of type: :values.',
    'mimetypes' => 'The :attribute fieldmust be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute fieldmust have at least :min items.',
        'file' => 'The :attribute fieldmust be at least :min kilobytes.',
        'numeric' => 'The :attribute fieldmust be at least :min.',
        'string' => 'The :attribute fieldmust be at least :min characters.',
    ],
    'min_digits' => 'The :attribute fieldmust have at least :min digits.',
    'missing' => 'The :attribute fieldmust be missing.',
    'missing_if' => 'The :attribute fieldmust be missing when :other is :value.',
    'missing_unless' => 'The :attribute fieldmust be missing unless :other is :value.',
    'missing_with' => 'The :attribute fieldmust be missing when :values is present.',
    'missing_with_all' => 'The :attribute fieldmust be missing when :values are present.',
    'multiple_of' => 'The :attribute fieldmust be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute fieldformat is invalid.',
    'numeric' => 'The :attribute fieldmust be a number.',
    'password' => [
        'letters' => 'The :attribute fieldmust contain at least one letter.',
        'mixed' => 'The :attribute fieldmust contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute fieldmust contain at least one number.',
        'symbols' => 'The :attribute fieldmust contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute fieldmust be present.',
    'prohibited' => 'The :attribute fieldis prohibited.',
    'prohibited_if' => 'The :attribute fieldis prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute fieldis prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute fieldprohibits :other from being present.',
    'regex' => 'The :attribute fieldformat is invalid.',
    'required' => 'The :attribute fieldis required.',
    'required_array_keys' => 'The :attribute fieldmust contain entries for: :values.',
    'required_if' => 'The :attribute fieldis required when :other is :value.',
    'required_if_accepted' => 'The :attribute fieldis required when :other is accepted.',
    'required_unless' => 'The :attribute fieldis required unless :other is in :values.',
    'required_with' => 'The :attribute fieldis required when :values is present.',
    'required_with_all' => 'The :attribute fieldis required when :values are present.',
    'required_without' => 'The :attribute fieldis required when :values is not present.',
    'required_without_all' => 'The :attribute fieldis required when none of :values are present.',
    'same' => 'The :attribute fieldmust match :other.',
    'size' => [
        'array' => 'The :attribute fieldmust contain :size items.',
        'file' => 'The :attribute fieldmust be :size kilobytes.',
        'numeric' => 'The :attribute fieldmust be :size.',
        'string' => 'The :attribute fieldmust be :size characters.',
    ],
    'starts_with' => 'The :attribute fieldmust start with one of the following: :values.',
    'string' => 'The :attribute fieldmust be a string.',
    'timezone' => 'The :attribute fieldmust be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute fieldmust be uppercase.',
    'url' => 'The :attribute fieldmust be a valid URL.',
    'ulid' => 'The :attribute fieldmust be a valid ULID.',
    'uuid' => 'The :attribute fieldmust be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
