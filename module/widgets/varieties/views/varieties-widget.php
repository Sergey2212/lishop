<?php
/**
 * @var \app\models\View $this
 * @var string $widget_id
 * @var \app\models\Submission $model
 * @var \kartik\widgets\ActiveForm $form
 */
?>

<div>

    <?php

    if ($model->parent_id > 0) {

        foreach ($object_property_groups as $i => $opg) {


            /** @var \app\models\Property[] $properties */
            $properties = app\models\Property::getForGroupId($opg->group->id);

            foreach ($properties as $prop) {
                if ($property_values = $model->getPropertyValuesByPropertyId($prop->id)) {
                    echo $prop->handler($form, $model->getAbstractModel(), $property_values, 'frontend_render_view');
                }
            }

        }
    }
    else{

        $tagLinks = [];
        foreach ($model->options as $tag) {
            $tagLinks[] = $tag->id;
        }


    ?>
    <br>
    <?= $model->category->name ?>
    <br>

    <?= implode(', ', $tagLinks) ?>

    <br>

    <?php

    print_r($tagLinks);


    }

    ?>


</div> <!-- /properties-widget -->
