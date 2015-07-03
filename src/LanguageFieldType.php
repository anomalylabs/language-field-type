<?php namespace Anomaly\LanguageFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class LanguageFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Language
 */
class LanguageFieldType extends FieldType
{

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.language::input';

    /**
     * Get the options.
     *
     * @return array
     */
    public function getOptions()
    {
        $locales = array_keys(config('streams::locales.supported'));
        $names   = array_map(
            function ($locale) {
                return trans('streams::locale.' . $locale . '.name');
            },
            $locales
        );

        return [null => $this->getPlaceholder()] + array_combine($locales, $names);
    }

    /**
     * Get the placeholder.
     *
     * @return null|string
     */
    public function getPlaceholder()
    {
        return $this->placeholder ?: 'anomaly.field_type.language::input.placeholder';
    }
}
