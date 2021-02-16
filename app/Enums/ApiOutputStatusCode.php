<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ApiOutputStatusCode extends Enum
{
    //success statuses
    const SUCCESS 					= 2000;

    //error statuses
    const ERROR 					= 5000;
    const FORM_VALIDATION_ERROR 	= 5001;

    //warning statuses
    const WARNING 					= 3000;
    const LANGUAGE_NOT_FOUND		= 3001;
}
