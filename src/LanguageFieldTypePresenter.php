<?php namespace Anomaly\LanguageFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class LanguageFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\LanguageFieldType
 */
class LanguageFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The decorated object.
     * This is for IDE support.
     *
     * @var LanguageFieldType
     */
    protected $object;

    /**
     * Get the language name.
     *
     * @return null|string
     */
    public function name()
    {
        if (!$key = $this->object->getValue()) {
            return null;
        }

        return trans(array_get($this->object->getOptions(), $key));
    }

    /**
     * Return the translated country name.
     *
     * @param null $locale
     * @return null|string
     */
    public function translated($locale = null)
    {
        if (!$key = $this->object->getValue()) {
            return null;
        }

        return trans('streams::locale.' . $key . '.name', [], $locale);
    }
}
