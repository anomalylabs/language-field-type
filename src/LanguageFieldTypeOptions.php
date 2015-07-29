<?php namespace Anomaly\LanguageFieldType;

/**
 * Class LanguageFieldTypeOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\LanguageFieldType
 */
class LanguageFieldTypeOptions
{

    /**
     * Handle the options.
     *
     * @param LanguageFieldType $fieldType
     */
    public function handle(LanguageFieldType $fieldType)
    {
        /**
         * Get supported locales and their
         * translated names and then sort them.
         */
        $locales = array_keys(config('streams::locales.supported'));

        $names = array_map(
            function ($locale) {
                return 'streams::locale.' . $locale . '.name';
            },
            $locales
        );

        $options = array_combine($locales, $names);

        asort($options);

        $fieldType->setOptions($options);
    }
}
