<?php

return [
    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'email' => 'The :attribute must be a valid email address.',
    'required' => ':attribute is required.',
    'unique' => 'The :attribute has already been taken.',
    'confirmed' => ':attribute confirmation does not match.',
    'min:string' => [
        'string' => 'The :attribute must be at least of :min characters.',
    ],
    'max:string' => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'numeric' => 'The :attribute must be a number.',
    'uppercase' => 'The :attribute must contain at least one uppercase letter.',
    'lowercase' => 'The :attribute must contain at least one lowercase letter.',
    'number' => 'The :attribute must contain at least one number.',
    'special_char' => 'The :attribute must contain at least one special character.',

    // Custom Attribute Names (optional)
    'attributes' => [
        'Reg_ID' => 'Registration ID',
        'password' => 'Password',
        'role' => 'Role',
        'classIn' => 'class',
        'subjectName' => 'subject',
        'cPassword' => 'Confirm Password',
        'pNumber' => 'Phone Number',
        'fName' => 'First Name',
        'lName' => 'Last Name',
    ],
];
