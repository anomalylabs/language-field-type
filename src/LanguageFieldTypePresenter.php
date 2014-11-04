<?php namespace Anomaly\Streams\Addon\FieldType\Language;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class LanguageFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Language
 */
class LanguageFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return the name of the language.
     *
     * @return null
     */
    public function name()
    {
        if ($code = $this->resource->getValue()) {

            $languages = $this->resource->getLanguages();

            if (isset($languages[$code])) {

                return $languages[$code];
            }
        }

        return null;
    }
}
 