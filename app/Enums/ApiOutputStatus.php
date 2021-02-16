<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ApiOutputStatus extends Enum
{
    //success statuses
    const SUCCESS 					= 'success';

    //error statuses
    const ERROR 					= 'error';
    const FORM_VALIDATION_ERROR 	= 'form_validation_error';

    //warning statuses
    const WARNING 					= 'warning';
    const LANGUAGE_NOT_FOUND		= 'language_not_found';
}
